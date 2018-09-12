<?php 
    $type = $_POST['type'];
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
    $up->id = $_POST['idInput'];
    $up->code = $_POST['codeInput'];
    $up->name = $_POST['nameInput'];
    $up->update();
    
    $alert = "CÓDIGO ACTUALIZADO";
    setcookie("alert", $alert, time()+3);
    Core::redir('./index.php?view=codigos-listAgregados');
?>