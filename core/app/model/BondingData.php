<?php
class BondingData {
	public static $tablename = "Test_Bonding";

	public function BondingData(){
		$Origen = '';
        $Fechap = '';
        $Horap = '';
        $Cod_Referencia = '';
        $Nombre_Referencia = '';
        $Fecha = '';
        $Hora = '';
        $Ref_Tela = '';
        $Pinta = '';
        $Color = '';
        $Proceso = '';
        $Ubicacion = '';
        $SKU = '';
        $Maquina = '';
        $Longitud_Inicial = '';
        $Longitud_Final = '';
        $Peso = '';
        $Grados_PFoAT800K = '';
        $Grados_Plato = '';
        $Grados_Pie = '';
        $Grados_Aire_S = '';
        $Grados_Aire_I = '';
        $Caudal_Sup = '';
        $Caudal_Inf = '';
        $Presion = '';
        $Velocidad = '';
        $Velocidad_Sup = '';
        $Velocidad_Inf = '';
        $Intensidad = '';
        $Tiempo_Exp = '';
        $Resultado = '';
        $Dinamometro = '';
        $Observaciones1 = '';  
	}

	public function add(){
		$sql = "INSERT INTO ".self::$tablename." (Origen,Fechap,Horap,Cod_Referencia,Nombre_Referencia,Fecha,Hora,Ref_Tela,Pinta,Color,Proceso,Ubicacion,SKU,Maquina,Longitud_Inicial,Longitud_Final,Peso,Grados_PFoAT800K,Grados_Plato,Grados_Pie,Grados_Aire_S,Grados_Aire_I,Caudal_Sup,Caudal_Inf,Presion,Velocidad,Velocidad_Sup,Velocidad_Inf,Intensidad,Tiempo_Exp,Resultado,Dinamometro,Observaciones1) ";
  		$sql .=	"VALUES ('$this->Origen','$this->Fechap','$this->Horap','$this->Referencia','$this->Nombre',CONVERT(date, GETDATE(), 110),CONVERT(varchar(10), GETDATE(), 108),'$this->Reftela','$this->Pinta','$this->Color','$this->Proceso','$this->Ubicacion','$this->Sku','$this->Maquina','$this->Longitudini','$this->Longitudfin','$this->Peso','$this->Plancha','$this->Plato','$this->Pie','$this->Airesup','$this->Aireinf','$this->Caudalsup','$this->Caudalinf','$this->Presion','$this->Velocidad','$this->Velocidad_Sup','$this->Velocidad_Inf','$this->Intensidad','$this->Tiempo','$this->Resultado','$this->Dinamometro','$this->Observaciones')";
		
		Executor::doit($sql);
	}
	
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto BondingData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set Origen='$this->Origen',Fechap='$this->Fechap',Horap='$this->Horap',Cod_Referencia='$this->Referencia',Nombre_Referencia='$this->Nombre',Ref_Tela='$this->Reftela',Pinta='$this->Pinta',Color='$this->Color',Proceso='$this->Proceso',Ubicacion='$this->Ubicacion',SKU='$this->Sku',Maquina='$this->Maquina',Longitud_Inicial='$this->Longitudini',Longitud_Final='$this->Longitudfin',Peso='$this->Peso',Grados_PFoAT800K='$this->Plancha',Grados_Plato='$this->Plato',Grados_Pie='$this->Pie',Grados_Aire_S='$this->Airesup',Grados_Aire_I='$this->Aireinf',Caudal_Sup='$this->Caudalsup',Caudal_Inf='$this->Caudalinf',Presion='$this->Presion',Velocidad='$this->Velocidad',Velocidad_Sup='$this->Velocidad_Sup',Velocidad_Inf='$this->Velocidad_Inf',Intensidad='$this->Intensidad',Tiempo_Exp='$this->Tiempo',Resultado='$this->Resultado',Dinamometro='$this->Dinamometro',Observaciones1='$this->Observaciones' where id=$this->id";
		Executor::doit($sql);
	}

	public static function getBondingHistorico($ref){
		$sql = "SELECT * FROM ".self::$tablename." WHERE Cod_Referencia = '".$ref."' ORDER BY Fechap DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BondingData());
	}

	public static function getBondingDesarrollo($ref){
		$sql = "SELECT * FROM ".self::$tablename." where Cod_Referencia= '$ref' and Origen= 'Desarrollo' ORDER BY Fechap DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BondingData());
	}

	public static function getBondingTodo(){ 
		$sql = "SELECT * FROM ".self::$tablename." ORDER BY Fechap DESC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BondingData());
	}

	public static function getById($name){
		$sql = "select * from ".self::$tablename." where Nombre='".$name."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BondingData());
	}

	public static function getRefById($id){
		$sql = "select * from ".self::$tablename." where id=".$id;
		$query = Executor::doit($sql);
		return Model::one($query[0], new BondingData());
	}

	public static function getBondingPlanta($planta){
		$sql = "select * from ".self::$tablename." where Origen='".$planta."'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BondingData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BondingData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BondingData());
	}

}

?>