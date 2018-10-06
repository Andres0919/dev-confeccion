<?php
class IndicadorData {
	public static $tablename = "RefColeccion";
	public static $tablename2 = "actReferencia";
	public static $tablename3 = "muestraFisica";

	public function IndicadorData(){
	}

	public function getPlanta(){return PlantData::getById($this->planta);}

	public function add(){
		$sql = "insert into ".self::$tablename." (referencia_id,coleccion_id) ";
		$sql .= "values ($this->referencia_id,$this->coleccion_id)";
		Executor::doit($sql);
	}

	public function addMuestra(){
		$sql = "insert into ".self::$tablename3." (actReferencia_id,isMuestra) ";
		$sql .= "values ($this->actReferencia_id,$this->isMuestra)";
		Executor::doit($sql);
	}

	function getLastId() {
		$sql = "select @@IDENTITY as id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new IndicadorData());
	}

	public function addActivityDate(){
		$sql = "insert into actReferencia (refColeccion_id, actividades_id, fecha_inicio, fecha_fin, analista_ficha,analista_id) ";
		$sql .= "values ($this->refColeccion_id, $this->actividad_id, '$this->fecha_inicio', '$this->fecha_fin','$this->analista_ficha',$this->analista_id)";

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

// partiendo de que ya tenemos creado un objecto IndicadorData previamente utilizamos el contexto
	public function addCodigo(){
		$sql = "update ".self::$tablename." set codigo='$this->codigo' where id=$this->id";
		Executor::doit($sql);
	}
	public function updateActivity(){
		$sql = "update ".self::$tablename2." set actividades_id=$this->actividades_id,fecha_inicio='$this->fecha_inicio',fecha_fin='$this->fecha_fin' where id=$this->id";
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
		$sql = "select c.nombre as coleccion, lc.fecha_entrega as entrega, tc.nombre as tcoleccion, lc.id from ".self::$tablename." rc ";
		$sql .= "inner join lineaColeccion lc ";
		$sql .= "on rc.coleccion_id = lc.id ";
		$sql .= "inner join coleccion c ";
		$sql .= "on lc.coleccion_id = c.id ";
		$sql .= "inner join tipoColeccion tc ";
		$sql .= "on lc.tipoColeccion_id = tc.id ";
		$sql .= "group by tc.nombre, c.nombre,lc.fecha_entrega,lc.id";
		
		$query = Executor::doit($sql);
		return Model::many($query[0],new IndicadorData());
	}

	public static function getAllRefOpc($id){
		$sql = "select u.nombre as analista, a.nombre as actividad, ar.* from actReferencia ar ";
		$sql .= "inner join actividades a ";
		$sql .= "on ar.actividades_id = a.id ";
		$sql .= "inner join Usuarios u ";
		$sql .= "on ar.analista_id = u.id ";
		$sql .= "where ar.refColeccion_id= $id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IndicadorData());
	}

	public function getActividadById(){
		$sql = "select * from actReferencia where id=$this->id ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new IndicadorData());
	}

	public static function getAllActividades(){
		$sql = "select * from actividades order by id asc ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new IndicadorData());
	}

	public static function getAllMF($id){
		$sql = "select a.nombre as actividad, mf.isMuestra as mf, ar.* from actReferencia ar ";
		$sql .= "inner join muestraFisica mf ";
		$sql .= "on mf.actReferencia_id = ar.id ";
		$sql .= "inner join actividades a ";
		$sql .= "on ar.actividades_id = a.id ";
		$sql .= "where ar.refColeccion_id=$id";

		$query = Executor::doit($sql);
		return Model::many($query[0],new IndicadorData());
	}

	public static function getRefsByColeccion($id){
		$sql = "select r.nombre as referencia, c.nombre as coleccion, tc.nombre as tcoleccion, rc.* from ".self::$tablename." rc ";
		$sql .= "inner join lineaColeccion lc ";
		$sql .= "on rc.coleccion_id = lc.id ";
		$sql .= "inner join coleccion c ";
		$sql .= "on lc.coleccion_id = c.id ";
		$sql .= "inner join tipoColeccion tc ";
		$sql .= "on lc.tipoColeccion_id = tc.id ";
		$sql .= "inner join referencia r ";
		$sql .= "on rc.referencia_id = r.id ";
		$sql .= "where lc.id=$id";

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