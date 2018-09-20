<?php 
    $actividad = new IndicadorData();
    $actividad->id = $_REQUEST['id'];
    $res = $actividad->getActividadById();
    
    echo json_encode($res);
?>