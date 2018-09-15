<?php 
    $referencia = new ReferenciaData();
    $referencia->nombre = $_POST['nombre'];
    $referencia->tipoReferencia_id = $_POST['treferencia'];
    $resp = $referencia->getByName();
    if (count($resp) > 0) {
        $alert = "LA REFERENCIA YA EXISTE";  
    }else{
        $referencia->add();
        $alert = "REFERENCIA AGREGADA"; 
    }
   
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=indicador-listado");
?>