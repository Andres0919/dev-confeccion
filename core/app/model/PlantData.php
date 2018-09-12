<?php
class PlantData {
	public static $tablename = "plant";


	public function PlantData(){
	} 

	public function add(){
		$sql = "insert into plant (name) ";
		$sql .= "values ('$this->name')";
		return Executor::doiit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doiit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doiit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set name='$this->name' where id=$this->id";
		Executor::doiit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doiit($sql);
		return Model::one($query[0],new PlantData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doiit($sql);
		return Model::many($query[0],new PlantData());
	}
}
?>