<?php
    $referencia = $_POST['referencia'];
    $indicador = new IndicadorData();
    $indicador->coleccion_id = $_POST['id'];
    foreach ($referencia as $ref) {
        $indicador->referencia_id = ReferenciaData::getIdByName($ref)->id;
        $indicador->add();
    }

    $alert = "REFERENCIA AGREGADA";
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=indicador-coleccion&id=$indicador->coleccion_id");
?>