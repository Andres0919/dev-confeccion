<?php
$user = Core::$user;
$r = new RequestData();
$r->reason = $_POST["reason"];
$r->fileM = "";
$r->term = '';
$r->nove = '';
switch ($r->reason) {
    case 'Reportar Problema':
        $r->canal = $_POST["canal"];
        $r->term = $_POST["term"];
        $r->nove = $_POST["nove"];				
        break;
    case 'Montar Canaleta':
        $r->canal = $_POST["canal"];
        move_uploaded_file($_FILES['fileM']['tmp_name'],"core/app/fileMarce/" . $_FILES['fileM']['name']);
        $r->fileM = $_FILES['fileM']['name'];
        break;
    
    default:
        $r->canal = $_POST["canal"];
        break;
}
$r->description = $_POST["description"];
$r->plant_id = $user->planta_id;
$r->created_id = $_POST["created_id"];

$r->add();

$alert = "Solicitud Creada Exitosamente";
setcookie("alert", $alert, time()+3);
Core::redir("./index.php?view=sm-requests");
?>