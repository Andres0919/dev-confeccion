<?php
session_start();

// -- eliminamos el usuario
if(isset($_SESSION['user'])){
	unset($_SESSION['user']);
}

session_destroy();
// v0 29 jul 2013
//estemos donde estemos nos redirije al index
print "<script>window.location='index.php';</script>";
?>