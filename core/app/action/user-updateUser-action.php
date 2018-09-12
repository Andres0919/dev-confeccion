<?php 
  $user = new UserData();
  $user->id = $_POST['idInput'];
  $user->Nombre = $_POST['nameInput'];
  $user->Pass = $_POST['passInput'];
  $user->estado = $_POST['estado'];
  $user->updateById();

  $alert = "USUARIO ACTUALIZADO";
  setcookie("alert", $alert, time()+3);
  Core::redir('./index.php?view=user-newPassForm');
?>