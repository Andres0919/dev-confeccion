<?php
class Database {
	public static $db;
	public static $con;
	public static $conn;
	function Database(){
	}

	function connect(){
		$conInfo = array("Database"=>"dev-Bonding", 'CharacterSet' => 'UTF-8' , "UID"=>"plc", "PWD"=>"plc");
		$conInfo1 = array("Database"=>"solicitud_marce", 'CharacterSet' => 'UTF-8' , "UID"=>"plc", "PWD"=>"plc");
		$serverName = "10.40.50.79\SQLEXPRESS";
		self::$con = sqlsrv_connect($serverName,$conInfo);
		self::$conn = sqlsrv_connect($serverName,$conInfo1);
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$db->connect();
		}
		return self::$con;
	}

	public static function getConn(){
		if(self::$conn==null && self::$db==null){
			self::$db = new Database();
			self::$db->connect();
		}
		return self::$conn;
	}
	
}
?>
