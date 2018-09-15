<?php 
    $coleccion = new ColeccionData();
    $coleccion->nombre = $_POST['nombre'];
    $resp = $coleccion->getByName();
    if (count($resp) > 0) {
        $alert = "LA COLECCIÓN YA EXISTE";   
    }else{
        $coleccion->add();
        $alert = "COLECCIÓN AGREGADA"; 
    }

    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=indicador-listado");
    
?>