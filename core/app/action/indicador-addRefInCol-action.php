<?php
    $referencia = $_POST['referencia'];
    $indicador = new IndicadorData();
    $indicador->coleccion_id = $_POST['id'];
    $indicador->referencia_id = ReferenciaData::getIdByName($referencia)->id;
    $indicador->add();

    $alert = "REFERENCIA AGREGADA";
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=indicador-listado");
?>