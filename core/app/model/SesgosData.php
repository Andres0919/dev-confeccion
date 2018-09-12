<?php
class SesgosData {
	public static $tablename = "Sesgos_Elasticos";

	public function SesgosData(){
		  
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename." ([Planta],[Insumo],[Nombre_Ref],[Cod_Ref],[Nombre_Pinta],[Cod_Pinta],[Recipiente],[Talla],[Sku],[Und_Bongo],[Faltantes],[Cantidad],[Problematica],[Hora],[Fecha],[Nombre_Responsable])";
		$sql .= " VALUES ('$this->Planta','$this->Insumo','$this->Nombre_Ref','$this->Cod_Ref','$this->Nombre_pinta','$this->Cod_pinta','$this->Recipiente','$this->Talla','$this->Sku','$this->Und_Bongo','$this->Faltantes','$this->Cantidad','$this->Problematica',CONVERT(varchar(10), GETDATE(), 108),CONVERT(date, GETDATE(), 110),'$this->responsable')";
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
		$sql = "update ".self::$tablename." set name=\"$this->name\",email=\"$this->email\",last_name=\"$this->last_name\",username=\"$this->username\",rol=$this->rol,plant_id=$this->plant_id where id=$this->id";
		Executor::doit($sql);
	}



	public static function getAll(){
        $sql = "SELECT * FROM ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new SesgosData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SesgosData());
	}

}

?>