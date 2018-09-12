<?php
$bonding = new BondingData();

$bonding->Origen=(isset($_POST['origen'])) ? $_POST['origen'] : '';
$bonding->Fechap=(isset($_POST['fechap'])) ? $_POST['fechap'] : '';
$bonding->Horap=(isset($_POST['horap'])) ? $_POST['horap'] : '';
$bonding->Referencia=(isset($_POST['referencia'])) ? $_POST['referencia'] : '';
$bonding->Nombre=(isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$bonding->Reftela=(isset($_POST['reftela'])) ? $_POST['reftela'] : '';
$bonding->Pinta=(isset($_POST['pinta'])) ? $_POST['pinta'] : '';
$bonding->Color=(isset($_POST['color'])) ? $_POST['color'] : '';
$bonding->Proceso=(isset($_POST['proceso'])) ? $_POST['proceso'] : '';
$bonding->Ubicacion=(isset($_POST['ubicacion'])) ? $_POST['ubicacion'] : '';
$bonding->Sku=(isset($_POST['sku'])) ? $_POST['sku'] : '';
$bonding->Maquina=(isset($_POST['maquina'])) ? $_POST['maquina'] : '' ;
$bonding->Longitudini=(isset($_POST['longitudini'])) ? $_POST['longitudini'] : '';
$bonding->Longitudfin=(isset($_POST['longitudfin'])) ? $_POST['longitudfin'] : '';
$bonding->Peso=(isset($_POST['peso'])) ? $_POST['peso'] : '';
$bonding->Plancha=(isset($_POST['plancha'])) ? $_POST['plancha'] : '';
$bonding->Plato=(isset($_POST['plato'])) ? $_POST['plato'] : '';
$bonding->Pie=(isset($_POST['pie'])) ? $_POST['pie'] : '';
$bonding->Airesup=(isset($_POST['airesup'])) ? $_POST['airesup'] : '';
$bonding->Aireinf=(isset($_POST['aireinf'])) ? $_POST['aireinf'] : '';
$bonding->Caudalsup=(isset($_POST['caudalsup'])) ? $_POST['caudalsup'] : '';
$bonding->Caudalinf=(isset($_POST['caudalinf'])) ? $_POST['caudalinf'] : '';
$bonding->Presion=(isset($_POST['presion'])) ? $_POST['presion'] : '';
$bonding->Velocidad=(isset($_POST['velocidad'])) ? $_POST['velocidad'] : '';
$bonding->Tiempo=(isset($_POST['tiempo'])) ? $_POST['tiempo'] : '';
$bonding->Resultado=(isset($_POST['resultado'])) ? $_POST['resultado'] : '';
$bonding->Observaciones=(isset($_POST['observaciones'])) ? $_POST['observaciones'] : '';
$bonding->Velocidad_Sup=(isset($_POST['vel_sup'])) ? $_POST['vel_sup'] : '';
$bonding->Velocidad_Inf=(isset($_POST['vel_inf'])) ? $_POST['vel_inf'] : '';
$bonding->Intensidad=(isset($_POST['intensidad'])) ? $_POST['intensidad'] : '';
$bonding->Dinamometro=(isset($_POST['dinamometro'])) ? $_POST['dinamometro'] : '';

if(isset($_POST['edit'])){
    $bonding->id = $_POST['idInput'];
    $result = $bonding->update();
    $alert = "DATOS ACTUALIZADOS";
}

if (isset($_POST['save'])) {
    $result = $bonding->add();
    $alert = "DATOS AGREGADOS";
}

if( $result === false ) {
	$alert = "Error en agregacion de datos";
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=bonding-fullForm");
}else{
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=bonding-fullForm");
}
?>