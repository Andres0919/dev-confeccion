<?php

class Session{
	public static function setUID($uid){
		$_SESSION['user'] = $uid;
	}

	public static function unsetUID(){
		if(isset($_SESSION['user']))
			unset($_SESSION['user']);
	}

	public static function issetUID(){
		if(isset($_SESSION['user']))
			return true;
		else return false;
	}

	public static function getUID(){
		if(isset($_SESSION['user']))
			return $_SESSION['user'];
		else return false;
	}

}

?>