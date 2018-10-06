<?php 
    $id = $_REQUEST['id'];
    $result = IndicadorData::getRefsByColeccion($id);

    echo json_encode($result);

?>
