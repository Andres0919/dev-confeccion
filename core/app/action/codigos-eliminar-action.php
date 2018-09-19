<?php
    $code = new CodigosData;
    $code->id = $_GET['id'];
    
    $code->del();

    $alert = "Codigo Eliminado";
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=codigos-listado");

?>