<?php
	if(count($_POST)>0){
		$plant = PlantData::getById($_POST["origin_id"]);
		$plant->name = strtoupper($_POST["name"]);
		$plant->update();
		
		$alert = "Planta Actualizada Exitosamente";
		setcookie("alert", $alert, time()+3);
		Core::redir("./index.php?view=sm-plants");
	}
?>