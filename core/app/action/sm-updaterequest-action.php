<?php
	if(count($_POST)>0){
		$request = RequestData::getById($_POST["id"]);
		$request->reason = $_POST["reason"];
		$request->description = $_POST["description"];
		switch ($request->reason) {
			case 'Reportar Problema':
				$request->canal = $_POST["canal"];
				$request->term = $_POST["term"];
				$request->nove = $_POST["nove"];				
				break;
			
			default:
				$request->canal = $_POST["canal"];
				$request->term = '';
				$request->nove = '';	
				break;
		}

		$request->plant_id = $_POST["plant_id"];

		$request->update();

		$alert = "Solicitud Actualizada Exitosamente";
		setcookie("alert", $alert, time()+3);
		Core::redir("./index.php?view=sm-requests");

	}
?>