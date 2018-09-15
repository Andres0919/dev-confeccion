<?php
class IndicadorData {
	public static $tablename = "RefColeccion";

	public function IndicadorData(){
	}

	public function getPlanta(){return PlantData::getById($this->planta);}

	public function add(){
		$sql = "insert into ".self::$tablename." (referencia_id,coleccion_id) ";
		$sql .= "values ($this->referencia_id,$this->coleccion_id)";
		Executor::doit($sql);
	}

	public function addActivityDate(){
		$sql = "insert into actReferencia (refColeccion_id, actividades_id, fecha_inicio, fecha_fin) ";
		$sql .= "values ($this->refColeccion_id, $this->actividad_id, '$this->fecha_inicio', '$this->fecha_fin')";
		Executor::doit($sql);
	}

	public function login(){
		$sql = "select * from Usuarios where Nombre= '$this->Nombre'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new IndicadorData());
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

// partiendo de que ya tenemos creado un objecto IndicadorData previamente utilizamos el contexto
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
		return Model::one($query[0],new IndicadorData());
	}

	public static function getAll(){
		$sql = "select r.nombre as referencia, c.nombre as coleccion, lc.fecha_entrega as entrega, tc.nombre as tcoleccion, rc.* from ".self::$tablename." rc ";
		$sql .= "inner join referencia r ";
		$sql .= "on rc.referencia_id = r.id ";
		$sql .= "inner join lineaColeccion lc ";
		$sql .= "on rc.coleccion_id = lc.id ";
		$sql .= "inner join coleccion c ";
		$sql .= "on lc.coleccion_id = c.id ";
		$sql .= "inner join tipoColeccion tc ";
		$sql .= "on lc.tipoColeccion_id = tc.id ";
		$sql .= "order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IndicadorData());
	}

	public static function getAllRefOpc($id){
		$sql = "select a.nombre as actividad, ar.* from actReferencia ar ";
		$sql .= "inner join actividades a ";
		$sql .= "on ar.actividades_id = a.id ";
		$sql .= "where ar.refColeccion_id= $id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IndicadorData());
	}

	public static function getAllActividades(){
		$sql = "select * from actividades order by id asc ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IndicadorData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IndicadorData());
	}

}

?>