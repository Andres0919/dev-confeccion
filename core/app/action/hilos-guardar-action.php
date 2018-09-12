<?php
$hilo = new HilosData();
$hilo->Planta=$_POST["planta"];
$hilo->Set1=$_POST["set"];
$hilo->Pinta=$_POST['pinta'];
$hilo->Insumos=$_POST['insumos'];
$hilo->Calibre=$_POST['calibre'];
$hilo->Referencia=$_POST['referencia'];
$hilo->ConsumoFicha=$_POST['consumo-ficha'];
$hilo->ConsumoReal=$_POST['consumo-real'];
$hilo->actDes='NO';
$hilo->actFic='NO';
$hilo->Diferencia= ($_POST['consumo-ficha'] - $_POST['consumo-real']);

$hilo->Porcentaje= ($hilo->Diferencia / $_POST['consumo-real'] * 100);

$hilo->add();
Core::redir('./index.php?view=hilos-datos&planta='.$hilo->Planta.'&set='.$hilo->Set1.'&otro=si');
?>
