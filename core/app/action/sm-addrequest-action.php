<?php

$r = new RequestData();
$r->reason = $_POST["reason"];
switch ($r->reason) {
    case 'Reportar Problema':
        $r->canal = $_POST["canal"];
        $r->term = $_POST["term"];
        $r->nove = $_POST["nove"];				
        break;
    
    default:
        $r->canal = $_POST["canal"];
        $r->term = '';
        $r->nove = '';	
        break;
}
$r->description = $_POST["description"];
$r->plant_id = $_POST["plant_id"];
$r->created_id = $_POST["created_id"];

$r->add();

$alert = "Solicitud Creada Exitosamente";
setcookie("alert", $alert, time()+3);
Core::redir("./index.php?view=sm-requests");
?>