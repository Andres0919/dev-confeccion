<?php
    $operacion = $_POST['agregaroperacion'];
    $pieza = $_POST['agregarpieza'];
    $maquina = $_POST['agregarmaquina'];
    $insumo = $_POST['agregarinsumo'];;

    $cadena_buscada   = '+';

    if ($operacion != '') {   
        $posicion_coincidencia = strpos($_POST['agregaroperacion'], $cadena_buscada);

        if ($posicion_coincidencia === false) {   
            echo"<script type=\"text/javascript\">alert('No se guardo la operacion por falta de el codigo.'); window.location='./index.php?view=codigos-form';</script><br/>";
        }else{
            $ope = explode($cadena_buscada, $operacion);
            $new = new OperacionData;
            $new->codigo = $ope[1];
            $new->nombre = $ope[0];
            $consulta = $new->getByCode($ope[1]);
            if(!isset($consulta)){
                $new->add();
                $alert = "Código operación agregado";
                
            }else{
                $encontrado = false;
                foreach ($consulta as $res) {
                    if($res->codigo === $ope[1]){
                        $encontrado = true;
                        break;
                    }
                }
                if (!$encontrado) {
                    $new->add();
                    $alert = "Código operación agregado";
                } else {
                    echo"<script type=\"text/javascript\">alert('Codigo de operacion ya existe.'); window.location='./index.php?view=codigos-form';</script><br/>";   
                }
            }
        }
    }

    if ($pieza != '') {  
        $posicion_coincidencia1 = strpos($_POST['agregarpieza'], $cadena_buscada);
        
        if ($posicion_coincidencia1 === false) {   
            echo"<script type=\"text/javascript\">alert('No se guardo la pieza por falta de el codigo.'); window.location='./index.php?view=codigos-form';</script><br/>";
        }else{
            $pie = explode($cadena_buscada, $pieza);
            $new = new PiezaData;
            $new->codigo = $pie[1];
            $new->nombre = $pie[0];
            $consulta = $new->getByCode($pie[1]);
            if(!isset($consulta)){
                $new->add();
                $alert = "Código pieza agregado";
            }else{
                $encontrado = false;
                foreach ($consulta as $res) {
                    if($res->codigo === $pie[1]){
                        $encontrado = true;
                        break;
                    }
                }
                if (!$encontrado) {
                    $new->add();
                    $alert = "Código pieza agregado";
                }else{
                    echo"<script type=\"text/javascript\">alert('Codigo de pieza ya existe.'); window.location='./index.php?view=codigos-form';</script><br/>";
                }
            }
        }
    }

    if ($maquina != '') {
        
        $posicion_coincidencia2 = strpos($_POST['agregarmaquina'], $cadena_buscada);
        
        if ($posicion_coincidencia2 === false) {   
            echo"<script type=\"text/javascript\">alert('No se guardo la maquina por falta de el codigo.'); window.location='./index.php?view=codigos-form';</script><br/>";
        }else{
            $maq = explode($cadena_buscada, $maquina);
            $new = new MaquinaData;
            $new->codigo = $maq[1];
            $new->nombre = $maq[0];
            $consulta = $new->getByCode($maq[1]);
            if(!isset($consulta)){
                $new->add();
                $alert = "Código maáquina agregado";
            }else{
                $encontrado = false;
                foreach ($consulta as $res) {
                    if($res->codigo === $maq[1]){
                        $encontrado = true;
                        break;
                    }
                }
                if (!$encontrado) {
                    $new->add();
                    $alert = "Código máquina agregado";
                }else{
                    echo"<script type=\"text/javascript\">alert('Codigo de maquina ya existe.'); window.location='./index.php?view=codigos-form';</script><br/>";
                }
            }
       }
    }

    if ($insumo != '') {
        
        $posicion_coincidencia3 = strpos($_POST['agregarinsumo'], $cadena_buscada);
        
        if ($posicion_coincidencia3 === false) {   
            echo"<script type=\"text/javascript\">alert('No se guardo el insumo por falta de el codigo.'); window.location='./index.php?view=codigos-form';</script><br/>";
        }else{
            $ins = explode($cadena_buscada, $insumo);
            $new = new InsumoData;
            $new->codigo = $ins[1];
            $new->nombre = $ins[0];
            $consulta = $new->getByCode($ins[1]);
            if(count($res) === 0 ){
                $new->add();
                $alert = "Código insumo agregado";
            }else{
                $encontrado = false;
                foreach ($consulta as $res) {
                    if($res->codigo === $ins[1]){
                        $encontrado = true;
                        break;
                    }
                }
                if (!$encontrado) {
                    $new->add();
                    $alert = "Código insumo agregado";
                }else{
                    echo"<script type=\"text/javascript\">alert('Codigo de insumo ya existe.'); window.location='./index.php?view=codigos-form';</script><br/>";
                }
            }
       }
    }

    setcookie("alert", $alert, time()+3);
    Core::redir('./index.php?view=codigos-form');
?>