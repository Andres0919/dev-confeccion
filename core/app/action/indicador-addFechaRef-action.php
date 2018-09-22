<?php
    $fecha = new IndicadorData();
    $fecha->refColeccion_id = $_POST['id'];
    $fecha->fecha_inicio = $_POST['fecha_inicio'];
    $fecha->fecha_fin = ($_POST['fecha_fin'] != '')? $_POST['fecha_fin'] : '';
    $fecha->actividad_id = $_POST['actividad'];
    $fecha->analista_ficha = $_POST['analista_ficha'];
    $fecha->analista_id = Core::$user->id;
    $fecha->addActivityDate();
    if($fecha->actividad_id == 2 || $fecha->actividad_id == 7){
        $mf = new IndicadorData();
        $mf->actReferencia_id = $fecha->getLastId()->id;
        $mf->isMuestra = $_POST['mf'];
        $mf->addMuestra();
    }

    $alert = "ACTIVIDAD AGREGADA";
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=indicador-RefCol&id=". $_POST['id']);
?>