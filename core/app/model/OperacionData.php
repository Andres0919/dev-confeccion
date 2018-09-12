<?php
class OperacionData {
	public static $tablename = "Operacion";

	public function OperacionData(){
		  
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename."([codigo],[nombre]) ";
		$sql .= "VALUES ('$this->codigo','$this->nombre')";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto CodigosData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre='$this->name',codigo='$this->code' where id=".$this->id;
		Executor::doit($sql);
	}

	public static function getAllAgregar(){
		$sql = "SELECT * FROM Agregar";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}

	public static function getAllOperacion(){
		$sql = "SELECT * FROM Operacion ORDER BY Fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}

	public static function getId($id){
		$sql = "select * from ".self::$tablename." where id =".$id;
		$query = Executor::doit($sql);
		return Model::one($query[0],new OperacionData());
	}

	public static function getById($name){
		$sql = "select * from ".self::$tablename." where Nombre='".$name."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new OperacionData());
	}

	public static function getByCode($code){
		$sql = "select * from ".self::$tablename." where codigo='".$code."'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by nombre";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}

	public static function getCountCodes($codigo){
		$sql = "SELECT count(*) count FROM ".self::$tablename." WHERE Codigo='".$codigo."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new OperacionData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}

	public static function getPiezaAndOperación($operacion, $pieza){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Operacion='$operacion' AND Pieza='$pieza'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperacionData());
	}

}

?>