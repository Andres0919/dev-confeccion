<?php
    $actividad = new IndicadorData();
    $actividad->id = $_POST['id'];
    $actividad->actividades_id = $_POST['actividad'];
    $actividad->fecha_inicio = $_POST['fecha_inicio'];
    $actividad->fecha_fin = $_POST['fecha_fin'];
    $actividad->updateActivity();
   
    $alert = "ACTIVIDAD ACTUALIZADA";
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=indicador-RefCol&id=". $_POST['idref']);
?>