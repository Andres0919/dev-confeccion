<?php
class HilosData {
	public static $tablename = "Ajuste_Hilos";

	public function HilosData(){
	}

	public function add(){

		$sql = "INSERT INTO ".self::$tablename." ([Planta],[Set1],[Pinta],[Insumos],[Calibre],[Referencia],[ConsumoFicha],[ConsumoReal],[Diferencia],[Porcentaje],[actDes],[actFic],[Fecha])";
        $sql .= " VALUES ('$this->Planta','$this->Set1','$this->Pinta','$this->Insumos','$this->Calibre','$this->Referencia','$this->ConsumoFicha','$this->ConsumoReal','$this->Diferencia','$this->Porcentaje','$this->actDes','$this->actFic',CONVERT(date, GETDATE(), 110))";
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

	public static function getByPlant($planta){
		$sql = "SELECT * FROM ".self::$tablename." where Planta ='".$planta."'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HilosData());
	}

	public static function getAll(){
		$sql = "SELECT * FROM ".self::$tablename." order by Fecha DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HilosData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HilosData());
	}

}

?>





