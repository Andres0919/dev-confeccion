<?php
$noConformes = new NoConformesData(); 

$noConformes->Planta=$_POST['planta'];
$noConformes->Categoria=$_POST['categoria'];
$noConformes->Item=$_POST['item'];
$noConformes->Marca=$_POST['marca'];
$noConformes->Referencia=$_POST['referencia'];
$noConformes->Familia=$_POST['familia'];
$noConformes->Observaciones=$_POST['observaciones'];
$noConformes->Responsable=$_POST['nombre'];

$result = $noConformes->add();
     
if($result === false){
    die('no dió');
}else{
    die('si dió');
}

?>