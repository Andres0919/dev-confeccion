<?php
    $id = $_REQUEST['id'];
    $user = UserData::getById($id);
    
    echo json_encode($user);
?>