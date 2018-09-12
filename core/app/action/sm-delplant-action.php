<?php
/**
* @author evilnapsis
**/
    $plant = PlantData::getById($_GET["id"]);
    $plant->del();
    $alert = "Planta Eliminada Exitosamente";
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=sm-plants");
?>