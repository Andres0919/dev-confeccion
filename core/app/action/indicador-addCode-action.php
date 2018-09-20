<?php
    $code = new IndicadorData();
    $code->id = $_POST['id'];
    $code->codigo = $_POST['codigo'];
    $code->addCodigo();

    $alert = "CÓDIGO AGREGADO";
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=indicador-RefCol&id=". $_POST['id']);

?>