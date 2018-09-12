<?php 

$request = RequestData::getById($_GET["id"]);
$request->asigned_id = $_GET['user_id'];
$request->status = 2;
$userRequest = RequestData::getAsignedUser($_GET['user_id']);
if (count($userRequest) > 0) {
    $alert = "Ya tienes una solicitud en curso";
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=sm-requests&alertype=alert-danger");
}else{
    $request->asignRequest();

    $alert = "Solicitud Asignada Exitosamente";
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=sm-requests");
}


?>