<?php
    $code = new CodigosData;
    $code->codigo = $_GET['codigo'];
    $code->usuario = $_GET['usuario'];
    $code->referencia = $_GET['referencia'];

    $code->del();

    $alert = "Codigo Eliminado";
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=codigos-listado");

?>