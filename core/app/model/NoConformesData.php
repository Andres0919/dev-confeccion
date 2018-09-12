<?php
class NoConformesData {
	public static $tablename = "No_Conformes";

	public function NoConformesData(){
		  
	}

	public function add(){

		$sql = "INSERT INTO ".self::$tablename." ([Planta],[Fecha],[Semana],[Categoria],[Item],[Marca],[Referencia],[Familia],[Observaciones]";
		$sql .= " VALUES ('$this->Planta',CONVERT(date, GETDATE(), 110),CONVERT(date, GETDATE(), 108),'$this->Categoria','$this->Item','$this->Marca','$this->Referencia','$this->Familia','$this->Observaciones'";
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
	$sql = "update ".self::$tablename." set name=\"$this->nam,email=\"$this->email\",last_name=\"$this->last_name\",username=\"$this->username\",rol=$this->rol,plant_id=$this->plant_id where id=$this->id";
		Executor::doit($sql);
	}



	public static function getAll(){
		$sql = "SELECT * FROM ".self::$tablename." order by Fecha DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new NoConformesData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new NoConformesData());
	}

}

?>