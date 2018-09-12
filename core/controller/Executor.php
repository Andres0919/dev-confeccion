<?php

class Executor {

	public static function doit($sql){
		$con = Database::getCon();
		if(Core::$debug_sql){
			print "<pre>".$sql."</pre>";
		}
		$query = sqlsrv_query($con, $sql);
		return array($query);
	}

	public static function doiit($sql){
		$con = Database::getConn();
		if(Core::$debug_sql){
			print "<pre>".$sql."</pre>";
		}
		$query = sqlsrv_query($con, $sql);
		return array($query);
	}
}
?>