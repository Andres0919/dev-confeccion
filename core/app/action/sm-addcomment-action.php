<?php
/**
* BookMedik
* @author evilnapsis
**/

if(count($_POST)>0){
	$comment = new CommentData();
	$comment->description = $_POST["comentario"];
	$comment->request_id = $_GET["id"];
	$comment->add();
	
$alert = "Comentario Agregado Exitosamente";
setcookie("alert", $alert, time()+3);
Core::redir("./index.php?view=sm-requests");

}


?>