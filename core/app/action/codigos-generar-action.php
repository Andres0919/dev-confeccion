<?php
    $code = new CodigosData();
    $code->Operacion=$_POST['operacion'];
    $code->Pieza=$_POST['pieza'];
    $code->Maquina=$_POST['maquina'];
    $code->Trayecto=$_POST['trayecto'];
    $code->Tela=$_POST['condiciones'];
    $code->GeoPieza=$_POST['geopieza'];
    $code->Corte=$_POST['corte'];
    $code->Insumo=$_POST['insumo'];
    $code->Tipotela=$_POST['tipotela'];
    $codigo = (isset($_POST['codigo']))? $_POST['codigo'] : '';
    $code->usuario = Core::$user->Nombre;
    $code->id = (isset($_POST['id']))? $_POST['id'] : '';
    $code->Referencia = (isset($_POST['referencia']))? $_POST['referencia'] : '';
    $code->Descripcion = (isset($_POST['descripcion']))? $_POST['descripcion'] : '';

    if (isset($_POST['update'])) {
        $code->codigo = $codigo;
        $code->update();
        $alert = "Datos actualizados";
        setcookie("alert", $alert, time()+3);        
        Core::redir('./index.php?view=codigos-listado');   
    }

    if(isset($_POST['generate'])){

        $operacion = OperacionData::getAll();
        $pieza = PiezaData::getAll();
        $maquina = MaquinaData::getAll();
        $insumo = InsumoData::getAll();

        foreach ($operacion as $res) {
            if ($res->nombre===$code->Operacion) {
                $Operacion1=$res->codigo;
                break;
            }
        }
        foreach($pieza as $res){
            if ($res->nombre===$code->Pieza) {
                $Pieza1=$res->codigo;
                break;
            }
        }
        foreach ($maquina as $res) {
            if ($res->nombre===$code->Maquina) {
                $Maquina1=$res->codigo;
                break;
            }
        }
        foreach ($insumo as $res) {
            if ($res->nombre===$code->Insumo) {
                $Insumo1=$res->codigo;
                break;
            }
        }

        switch ($code->Tipotela) {
            case 'ESTÁNDAR':
                $Tipotela1=1;
                break;
            case 'ESPECIAL':
                $Tipotela1=2;
                break;  
            case 'NO APLICA':
                $Tipotela1=3;
                break;  
            default:
                $Tipotela1='error';
                break;
        }
        switch ($code->GeoPieza) {
            case 'RECTO':
                $Geopieza1=1;
                break;
            case 'CURVA':
                $Geopieza1=2;
                break;
            case 'NO APLICA':
                $Geopieza1=0;
                break;  
            default:
                $Geopieza1='error';
                break;
        }
        switch ($code->Corte) {
            case 'ABIERTO':
                $Corte1=1;
                break;
            case 'TUBULAR':
                $Corte1=2;
                break;
            case 'NO APLICA':
                $Corte1=3;
                break;  
            default:
                $Corte1='error';
                break;
        }
        switch ($code->Tela) {
            case 'FONDO':
                $Condicion1=1;
                break;
            case 'RAYAS':
                $Condicion1=2;
                break;
            case 'NO APLICA':
                $Condicion1=3;
                break;  
            default:
                $Condicion1='error';
                break;
        }
        switch ($code->Trayecto) {
            case 'PEQUEÑO':
                $Trayecto1=1;
                break;
            case 'MEDIANO':
                $Trayecto1=2;
                break;
            case 'GRANDE':
                $Trayecto1=3;
                break;
            case 'NO APLICA':
                $Trayecto1=4;
                break;
            default:
                $Trayecto1='error';
                break;
        }

        $codigo=$Operacion1.$Pieza1.$Maquina1.$Trayecto1.$Condicion1.$Geopieza1.$Corte1.$Insumo1.$Tipotela1;
        Core::redir("./index.php?view=codigos-form&op=".$code->Operacion."&pi=".$code->Pieza."&ma=".$code->Maquina."&tr=".$code->Trayecto."&te=".$code->Tela."&ge=".$code->GeoPieza."&cor=".$code->Corte."&in=".$code->Insumo."&ti=".$code->Tipotela."&co=".$codigo."&id=".$code->id."&rf=".$code->Referencia."&d=".$code->Descripcion);
    }

    if(isset($_POST['save'])){
        $code->Referencia = $_POST['referencia'];
        $code->Descripcion = $_POST['descripcion'];
        $code->codigo = $codigo;
		if (strlen ($codigo)!=13) {
			echo "	<script>
						alert('no se puede guardar el registro por que el código no es valido');
						location.href='form-codigos.php';
					</script>";
		}
        $Codigo = CodigosData::getCode($code->codigo);

		if (count($Codigo) == 0 || $code->codigo != $Codigo->Codigo) {
            $code->add();
            $alert = "CÓDIGO GENERADO";
        }else{
            echo "<script>
                alert('no se puede guardar el registro por que ya existe el codigo');
            </script>";
		}
        setcookie("alert", $alert, time()+3);        
        Core::redir('./index.php?view=codigos-form');                
    }
?>




