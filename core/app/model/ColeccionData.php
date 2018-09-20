<?php
class ColeccionData {
	public static $tablename = "coleccion";
	public static $tablename2 = "tipoColeccion";
	public static $tablename3 = "lineaColeccion";

	public function ColeccionData(){
	}

	public function getPlanta(){return PlantData::getById($this->planta);}

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre) ";
		$sql .= "values ('$this->nombre')";
		Executor::doit($sql);
	}

	public function addLinea(){
		$sql = "insert into ".self::$tablename3." (tipoColeccion_id,coleccion_id,fecha_entrega,isActive,analista_id) ";
		$sql .= "values ($this->tcoleccion,$this->coleccion_id,'$this->fecha_entrega',1,$this->analista_id)";
		Executor::doit($sql);
	}

	public function getIdByTC($tcoleccion, $coleccion){
		$sql = "select * from ".self::$tablename3." where tipoColeccion_id=$tcoleccion and coleccion_id=$coleccion";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ColeccionData());
	}

	function getLastId() {
		$sql = "select @@IDENTITY as id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ColeccionData());
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ColeccionData previamente utilizamos el contexto
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
		return Model::one($query[0],new ColeccionData());
	}

	public static function getAllTypes(){
		$sql = "select * from ".self::$tablename2." order by id ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ColeccionData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ColeccionData());
	}

	public static function getAllini(){
		$sql = "select c.nombre as coleccion, tc.nombre as tcoleccion, lc.fecha_entrega as entrega , lc.* from ".self::$tablename3." lc ";
		$sql .= "inner join coleccion c ";
		$sql .= "on lc.coleccion_id = c.id ";
		$sql .= "inner join tipoColeccion tc ";
		$sql .= "on lc.tipoColeccion_id = tc.id ";
		$sql .= " order by id ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ColeccionData());
	}

	public static function getRefCol($id){
		$sql = "select r.nombre as referencia, tr.nombre as treferencia, c.nombre as coleccion, tc.nombre as tcoleccion, u.Nombre as analista, lc.fecha_entrega as entrega, rc.* from RefColeccion rc ";
		$sql .= "inner join referencia r ";
		$sql .= "on rc.referencia_id = r.id ";
		$sql .= "inner join lineaColeccion lc ";
		$sql .= "on rc.coleccion_id = lc.id ";
		$sql .= "inner join coleccion c ";
		$sql .= "on lc.coleccion_id = c.id ";
		$sql .= "inner join tipoColeccion tc ";
		$sql .= "on lc.tipoColeccion_id = tc.id ";
		$sql .= "inner join tipoReferencia tr ";
		$sql .= " on tipoReferencia_id = tr.id ";
		$sql .= "inner join Usuarios u ";
		$sql .= "on lc.analista_id = u.id ";
		$sql .= " where rc.id=$id ";

		$query = Executor::doit($sql);
		return Model::one($query[0],new ColeccionData());
	}
	
	public function getByName(){
		$sql = "select * from ".self::$tablename." where nombre = '$this->nombre'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ColeccionData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ColeccionData());
	}

}

?>