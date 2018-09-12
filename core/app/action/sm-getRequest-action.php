<?php 
    $id = $_REQUEST['id'];
    $request = RequestData::getById($id);
    echo json_encode($request);

?>