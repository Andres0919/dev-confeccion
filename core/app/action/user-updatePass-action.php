<?php 
    $current_pass = $_POST['pass'];
    $newpass = $_POST['newpass'];
    $user = Core::$user;
    $update = new UserData();

    if($user->Pass === $current_pass){
        $update->id = $user->id;
        $update->pass = $newpass;
        $update->update_passwd();
        
        $alert = "Contraseña Actualizada Exitosamente";
		setcookie("alert", $alert, time()+3);
        Core::redir('./index.php?view=user-newPassForm');
    }else{
        $alert = "Contraseña actual incorrecta";
		setcookie("alert", $alert, time()+3);
        Core::redir('./index.php?view=user-newPassForm');
    }
?>