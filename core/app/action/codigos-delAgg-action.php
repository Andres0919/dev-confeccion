<?php
    $type = $_GET['type'];
    switch ($type) {
        case 'ope':
            $up = new OperacionData();
            break;

        case 'pie':
            $up = new PiezaData();
            break;
        
        case 'ins':
            $up = new InsumoData();
            break;

        case 'maq':
            $up = new MaquinaData();
            break;

    }
    $up->id = $_GET['id'];
    $up->del();
    $alert = "CÓDIGO ELIMINADO";
    setcookie("alert", $alert, time()+3);
    Core::redir('./index.php?view=codigos-listAgregados');
?>