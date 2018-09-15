<?php
    $fecha = new IndicadorData();
    $fecha->refColeccion_id = $_POST['id'];
    $fecha->fecha_inicio = $_POST['fecha_inicio'];
    $fecha->fecha_fin = ($_POST['fecha_fin'] != '')? $_POST['fecha_fin'] : '';
    $fecha->actividad_id = $_POST['actividad'];
    $fecha->addActivityDate();

    $alert = "ACTIVIDAD AGREGADA";
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=indicador-RefCol&id=". $_POST['id']);
?>