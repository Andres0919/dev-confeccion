<?php
class ReferenciaData {
	public static $tablename = "referencia";
	public static $tablename2 = "tipoReferencia";

	public function ReferenciaData(){
	}

	public function getPlanta(){return PlantData::getById($this->planta);}

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre, tipoReferencia_id) ";
		$sql .= "values ('$this->nombre',$this->tipoReferencia_id)";
		
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

// partiendo de que ya tenemos creado un objecto ReferenciaData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",email=\"$this->email\",last_name=\"$this->last_name\",username=\"$this->username\",rol=$this->rol,plant_id=$this->plant_id where id=$this->id";
		Executor::doit($sql);
	}

	public function updateById(){
		$sql = "update ".self::$tablename." set Nombre='$this->Nombre', Pass='$this->Pass', estado= $this->estado where id = $this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set Pass='$this->pass' where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ReferenciaData());
	}

	public function getByName(){
		$sql = "select * from ".self::$tablename." where nombre = '$this->nombre'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ReferenciaData());
	}

	public function getIdByName($nombre){
		$sql = "select * from ".self::$tablename." where nombre = '$nombre'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ReferenciaData());
	}

	public static function getAllTypes(){
		$sql = "select * from ".self::$tablename2." order by id ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReferenciaData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReferenciaData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReferenciaData());
	}

}

?>