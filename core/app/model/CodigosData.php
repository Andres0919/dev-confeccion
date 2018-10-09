<?php
class CodigosData {
	public static $tablename = "Codigos";

	public function CodigosData(){
		  
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename."([Codigo],[Operacion],[Pieza],[Maquina],[Trayecto],[Condicion_Tela],[Geo_Pieza],[Corte_Pieza],[Insumo],[Tipo_Tela],[Referencia],[Descripcion],[Usuario],[Fecha]) ";
		$sql .= "VALUES ('$this->codigo','$this->Operacion','$this->Pieza','$this->Maquina','$this->Trayecto','$this->Tela','$this->GeoPieza','$this->Corte','$this->Insumo','$this->Tipotela','$this->Referencia','$this->Descripcion','$this->usuario',CONVERT(date, GETDATE(), 110))";
            
		Executor::doit($sql);
	}

	public function addAgregar(){
		
        $sql = "INSERT INTO Agregar ([OperacionCodigo],[PiezaCodigo],[MaquinaCodigo],[InsumoCodigo]) VALUES ('$this->Operacion','$this->Pieza','$this->Maquina','$this->Insumo')";
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
		$sql = "update ".self::$tablename." set Codigo='$this->codigo',Operacion='$this->Operacion',Pieza='$this->Pieza',Maquina='$this->Maquina',Trayecto='$this->Trayecto',Condicion_Tela='$this->Tela',Geo_Pieza='$this->GeoPieza',Corte_Pieza='$this->Corte',Insumo='$this->Insumo',Tipo_Tela='$this->Tipotela',Referencia='$this->Referencia',Descripcion='$this->Descripcion' where id = $this->id";

		Executor::doit($sql);
	}

	public static function getAllAgregar(){
		$sql = "SELECT * FROM Agregar";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CodigosData());
	}

	public static function getAllCodigos(){
		$sql = "SELECT * FROM Codigos ORDER BY Fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CodigosData());
	}

	public static function getById($name){
		$sql = "select * from ".self::$tablename." where Nombre='".$name."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CodigosData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CodigosData());
	}

	public static function getCode($codigo){
		$sql = "SELECT *  FROM ".self::$tablename." WHERE Codigo='".$codigo."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CodigosData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CodigosData());
	}

	public static function getAllOptions($Operacion, $Pieza, $Maquina){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Operacion='$Operacion' AND Pieza='$Pieza' AND Maquina = '$Maquina'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CodigosData());
	}

	public static function getPiezaAndOperacion($operacion, $pieza){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Operacion='$operacion' AND Pieza='$pieza'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CodigosData());
	}

	public static function getOperacionAndMaquina($operacion, $maquina){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Operacion='$operacion' AND Maquina='$maquina'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CodigosData());
	}

	public static function getPiezaAndMAquina($pieza, $maquina){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Pieza='$pieza' AND Maquina='$maquina'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CodigosData());
	}

	public static function getOperacion($operacion){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Operacion='$operacion'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CodigosData());
	}

	public static function getPieza($pieza){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Pieza='$pieza'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CodigosData());
	}

	public static function getMaquina($maquina){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Maquina='$maquina'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CodigosData());
	}

	public function getSimilars(){
		$sql = "SELECT * FROM ".self::$tablename;
		$sql .= " WHERE substring(Codigo,1,2) = '$this->operacion' ";
		$sql .= " OR substring(Codigo,3,2) = '$this->pieza' ";
		$sql .= " OR substring(Codigo,5,3) = '$this->maquina' ";
		$sql .= " OR substring(Codigo,8,1) = '$this->costura' ";
		$sql .= " OR substring(Codigo,9,1) = '$this->ctela' ";
		$sql .= " OR substring(Codigo,10,1) = '$this->geometria' ";
		$sql .= " OR substring(Codigo,11,1) = '$this->corte' ";
		$sql .= " OR substring(Codigo,12,1) = '$this->insumo' ";
		$sql .= " OR substring(Codigo,13,1) = '$this->ttela' ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CodigosData());
	}

}

?>