<?php
class UserData {
	public static $tablename = "Usuarios";

	public function UserData(){
	}

	public function getPlanta(){return PlantData::getById($this->planta);}

	public function add(){
		$sql = "insert into ".self::$tablename." (Nombre,Pass,Categoria,planta_id) ";
		$sql .= "values ('$this->usuario','$this->pass',$this->categoria,$this->planta)";
		Executor::doit($sql);
	}

	public function login(){
		$sql = "select * from Usuarios where Nombre= '$this->Nombre'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public function actividad(){
		$sql = "INSERT INTO Actividad ([Usuario],[Fecha],[Hora]) VALUES ('$this->Nombre',CONVERT(date, GETDATE(), 110),CONVERT(varchar(10), GETDATE(), 108))";
		$query = Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
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
		return Model::one($query[0],new UserData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." where creador = 7";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

}

?>