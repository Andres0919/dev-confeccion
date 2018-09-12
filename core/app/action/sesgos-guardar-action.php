<?php
$sesgo = new SesgosData();
$sesgo->Planta=$_POST["planta"];
$sesgo->Insumo=$_POST["insumo"];
$sesgo->Recipiente=$_POST["recipiente"];
$sesgo->Nombre_Ref=$_POST["nombre_ref"];
$sesgo->Cod_Ref=$_POST["cod_ref"];
$sesgo->Nombre_pinta=$_POST["nombre_pinta"];
$sesgo->Cod_pinta=$_POST["cod_pinta"];
$sesgo->Talla=$_POST["talla"];
$sesgo->Sku=$_POST["sku"];
$sesgo->Und_Bongo=$_POST["und_bongo"];
$sesgo->Faltantes=$_POST["und_faltantes"];
$sesgo->Cantidad=$_POST["cantidad"];
$sesgo->Problematica=$_POST["problematica"];
$sesgo->responsable = Core::$user->Nombre;

$sesgo->add();
Core::redir('./index.php?view=sesgos-form');

?>