<?php 
    $coleccion = new ColeccionData();
    $coleccion->nombre = $_POST['coleccion'];
    $coleccion->tcoleccion = $_POST['tcoleccion'];
    $coleccion->coleccion_id = $coleccion->getByName()->id;
    $coleccion->analista_id = Core::$user->id;
    $coleccion->fecha_entrega = $_POST['entrega'];
    $coleccion->fecha_precosteo = $_POST['precosteo'];
    $resp = ColeccionData::getIdByTC($coleccion->tcoleccion, $coleccion->coleccion_id);
    if (count($resp) > 0) {
        $alert = "LA COLECCIÓN YA ESTABA INICIADA";
    }else{
        $coleccion->addLinea();
        $alert = "COLECCIÓN INICIADA";
    }
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=indicador-listado");    
?>