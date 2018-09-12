<?php
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $categoria = $_POST['categoria'];
    $planta = $_POST['planta'];

    $new = new UserData;
    $new->usuario = $usuario;
    $new->pass = $pass;
    $new->categoria = $categoria;
    $new->planta = $planta;
    $new->add();

    $alert = "Usuario Creado";
    setcookie("alert", $alert, time()+3);
    Core::redir("./index.php?view=user-newPassForm");
?>