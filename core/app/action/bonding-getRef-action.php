<?php 
    $id = $_REQUEST['id'];
    $referencia = BondingData::getRefById($id);
    echo json_encode($referencia);
?>