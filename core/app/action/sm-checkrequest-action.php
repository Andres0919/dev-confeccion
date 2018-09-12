<?php
/**
* @author evilnapsis
**/
    $user = RequestData::getById($_GET["id"]);
    $user->finishRequest();
    $alert = "Solicitud Terminada Exitosamente";
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=sm-requests");

?>