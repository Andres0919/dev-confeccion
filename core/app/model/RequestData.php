<?php
class RequestData {
	public static $tablename = "request";

	public function RequestData(){
		$this->created_at = "NOW()";
	}

	public function getCreated(){ return UserData::getById($this->created_id); }
	public function getAsigned(){ return UserData::getById($this->asigned_id); }
	public function getPlant(){ return PlantData::getById($this->plant_id); }

	public function add(){
		$sql = "insert into request (reason,description,canal,term,nove,plant_id,created_id,created_at, fileM) ";
		$sql .= "values ('$this->reason','$this->description','$this->canal','$this->term','$this->nove','$this->plant_id','$this->created_id',GETDATE(), '$this->fileM')";
		return Executor::doiit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doiit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doiit($sql);
	}

	// partiendo de que ya tenemos creado un objecto RequestData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set reason='$this->reason',description='$this->description',canal='$this->canal',term='$this->term',nove='$this->nove',plant_id='$this->plant_id' where id=$this->id";

		Executor::doiit($sql);
	}

	public function asignRequest(){
		$sql = "update ".self::$tablename." set asigned_id=$this->asigned_id,asigned_at= GETDATE(),status=2 where id = $this->id";
		Executor::doiit($sql);
	}
	
	public function finishRequest(){
		$sql = "update ".self::$tablename." set finished_at= GETDATE(),status=3 where id = $this->id";		
		Executor::doiit($sql);
		
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doiit($sql);
		return Model::one($query[0],new RequestData());
	}

	public static function getByMail($mail){
		$sql = "select * from ".self::$tablename." where mail=\"$mail\"";
		$query = Executor::doiit($sql);
		return Model::one($query[0],new RequestData());
	}

	public static function getEvery(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doiit($sql);
		return Model::many($query[0],new RequestData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doiit($sql);

		return Model::many($query[0],new RequestData());
	}

	public static function getAllPendings(){ 
		$sql = "select *, convert(char(8), created_at, 114) as hora from ".self::$tablename." where status=1";
		$query = Executor::doiit($sql);
		
		return  Model::many($query[0],new RequestData());
	}

	public static function getAllPendingsPlant($plant_id){
		$plant = ($plant_id != '')? $plant_id : 0;
		$sql = "select * from ".self::$tablename." where status = 1 and plant_id =".$plant;
		$query = Executor::doiit($sql);

		return Model::many($query[0],new RequestData());
	}

	public static function getAllAsigned(){ 
		$sql = "select * from ".self::$tablename." where status=2";
		$query = Executor::doiit($sql);
		return Model::many($query[0],new RequestData());
	}
	
	public static function getAllFinished(){ 
		$sql = "select * from ".self::$tablename." where status=3";
		$query = Executor::doiit($sql);
		return Model::many($query[0],new RequestData());
	}

	public static function getAllFinishedUser($asigned){ 
		$sql = "select * from ".self::$tablename." where status=3 and asigned_id=".$asigned;
		$query = Executor::doiit($sql);
		return Model::many($query[0],new RequestData());
	}

	public static function getAsignedUser($user_id){
		$sql = "select * from ".self::$tablename." where status = 2 and asigned_id =".$user_id;
		$query = Executor::doiit($sql);
		return Model::many($query[0], new RequestData()); 
	}

	public static function getAllByPacientId($id){
		$sql = "select * from ".self::$tablename." where pacient_id=$id order by created_at";
		$query = Executor::doiit($sql);
		return Model::many($query[0],new RequestData());
	}

	public static function getBySQL($sql){
		$query = Executor::doiit($sql);
		return Model::many($query[0],new RequestData());
	}

	public static function getOld(){
		$sql = "select * from ".self::$tablename." where date(date_at)<date(NOW()) order by date_at";
		$query = Executor::doiit($sql);
		return Model::many($query[0],new RequestData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%'";
		$query = Executor::doiit($sql);
		return Model::many($query[0],new RequestData());
	}

	public static function getPromAsigned(){
		$sql = "select AVG(TIMESTAMPDIFF(HOUR, created_at,asigned_at)) dias from ".self::$tablename." where status = 2 or status = 3";
		$query = Executor::doiit($sql);
		return Model::many($query[0],new RequestData());
	}

	public static function getPromFromAsignedToFinished(){
		$sql = "select AVG(TIMESTAMPDIFF(HOUR, asigned_at,finished_at)) dias from ".self::$tablename." where status = 3 ";
		$query = Executor::doiit($sql);
		return Model::many($query[0],new RequestData());
	}

	public static function getPromFinished(){
		$sql = "select AVG(TIMESTAMPDIFF(HOUR, created_at,finished_at)) dias from ".self::$tablename." where status = 3 ";
		$query = Executor::doiit($sql);
		return Model::many($query[0],new RequestData());
	}
}

?>