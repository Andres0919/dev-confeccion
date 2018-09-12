<?php
/**
* BookMedik
* @author evilnapsis
**/

if(count($_POST)>0){
	$plant = new PlantData();
	$plant->name = strtoupper($_POST["name"]);
	$plant->add();

$alert = "Planta Creada Exitosamente";
setcookie("alert", $alert, time()+3);
Core::redir("./index.php?view=sm-plants");

}


?>