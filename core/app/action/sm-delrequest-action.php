<?php
/**
* @author evilnapsis
**/
    $request = RequestData::getById($_GET["id"]);
    $request->del();
    $alert = "Solicitud Eliminado Exitosamente";
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=requests");
?>