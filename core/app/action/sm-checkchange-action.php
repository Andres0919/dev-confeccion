<?php
    $user = Core::$user;
	if ($user->Categoria == 1 || $user->Nombre == 'consulta') {
		$pendientes = RequestData::getAllPendings();
	}else{
		$pendientes = RequestData::getAllPendingsPlant($user->planta_id);
    }
    $count = count($pendientes); 
    if($count == $_REQUEST['count']){
        $change = array('change' => false);
    }else{
        $change = array('change' => true);
    }
    
    echo json_encode($change);
?>