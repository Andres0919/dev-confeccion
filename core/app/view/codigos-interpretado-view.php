<?php
  $operacion = OperacionData::getAll();
  $pieza = PiezaData::getAll();
  $maquina = MaquinaData::getAll();
  $insumo = InsumoData::getAll();

  $Codigo = $_POST['codigo'];
  $str = preg_split('//', $Codigo, -1, PREG_SPLIT_NO_EMPTY);
  
  $Operacion2=$str[0].$str[1];
  $Pieza2=$str[2].$str[3];
  $Maquina2=$str[4].$str[5].$str[6];
  $Trayecto2=$str[7];
  $Condicion2=$str[8];
  $Geopieza2=$str[9];
  $Corte2=$str[10];
  $Insumo2=$str[11];
  $Tipotela2=$str[12];

  
  foreach ($operacion as $res){
    if ($res->codigo===$Operacion2) {
      $Operacion1=$res->nombre;
      break;
    }
  }
  foreach ($pieza as $res) {
    if ($res->codigo===$Pieza2) {
      $Pieza1=$res->nombre;
      break;
    }
  }
  foreach ($maquina as $res) {
    if ($res->codigo===$Maquina2) {
      $Maquina1=$res->nombre;
      break;
    }
  }
  foreach ($insumo as $res) {
    if ($res->codigo===$Insumo2) {
      $Insumo1=$res->nombre;
      break;
    }
  }     
  
  switch ($Trayecto2) {
    case 1:
      $Trayecto1='PEQUEÑO';
      break;
    case 2:
      $Trayecto1='MEDIANO';
      break;
    case 3:
      $Trayecto1='GRANDE';
      break;
    case 4:
      $Trayecto1='NO APLICA';
      break;	
    default:
      $Trayecto1='no existe';
      break;
  }

  switch ($Condicion2) {
    case 1:
      $Condicion1='FONDO';
      break;
    case 2:
      $Condicion1='RAYAS';
      break;
    case 3:
      $Condicion1='NO APLICA';
      break;	
    default:
      $Condicion1='no existe';
      break;
  }

  switch ($Geopieza2) {
    case 1:
      $Geopieza1='RECTO';
      break;
    case 2:
      $Geopieza1='CURVA';
      break;
    case 0:
      $Geopieza1='NO APLICA';
      break;	
    default:
      $Geopieza1='no existe';
      break;
  }

  switch ($Corte2) {
    case 1:
      $Corte1='ABIERTO';
      break;
    case 2:
      $Corte1='TUBULAR';
      break;
    case 3:
      $Corte1='NO APLICA';
      break;	
    default:
      $Corte1='no existe';
      break;
  }

  switch ($Tipotela2) {
    case 1:
      $Tipotela1='ESTANDAR';
      break;
    case 2:
      $Tipotela1='ESPECIAL';
      break;	
    case 3:
      $Tipotela1='NO APLICA';
      break;		
    default:
      $Tipotela1='no existe';
      break;
  }

?>
<div class="secc">
	<div class="card card-interpretado">
		<div class="card-header">
			<h4>INTERPRETACIÓN</h4>
		</div>
    <!-- <a href="./index.php?view=codigos-interpretar"><img src="assets/img/atras.png" alt="atras" width="55" height="55" title="atrás"></a> -->
    <table class="egt">
      <tr>
        <th>CÓDIGO INTERPRETADO</th>
        <td><?php echo $Codigo?> </td>
      </tr>
      <tr>
        
        <th>OPERACIÓN</th>
        <td><?php echo (isset($Operacion1))? $Operacion1 : '-' ?></td>
      </tr>  
      <tr>
        <th>PIEZA</th>
        <td><?php echo (isset($Pieza1))? $Pieza1 : '-' ?></td>
      </tr>
      <tr>
        <th>MÁQUINA</th>
        <td><?php echo (isset($Maquina1))? $Maquina1 : '-' ?></td>
      </tr>
      <tr>
        <th>TRAYECTO DE LA TELA</th>
        <td> <?php echo (isset($Trayecto1))? $Trayecto1 : '-' ?></td>
      </tr>
      <tr>
        <th>CONDICIÓN DE LA TELA</th>
        <td><?php echo (isset($Condicion1))? $Condicion1 : '-' ?></td>
      </tr>
      <tr>
        <th>GEOMETRÍA DE LA PIEZA</th>
        <td><?php echo (isset($Geopieza1))? $Geopieza1 : '-' ?></td>
      </tr>
      <tr>
        <th>CORTE DE LA PIEZA</th>
        <td><?php echo (isset($Corte1))? $Corte1 : '-' ?></td>
      </tr>
      <tr>
        <th>INSUMO</th>
        <td><?php echo (isset($Insumo1))? $Insumo1 :'-' ?></td>
      </tr>
      <tr>
        <th>TIPO DE TELA</th>
        <td><?php echo (isset($Tipotela1))? $Tipotela1 : '-' ?></td>
      </tr>
    </table>
  </div>
</div>
