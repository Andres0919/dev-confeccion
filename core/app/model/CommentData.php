<?php
class CommentData {
	public static $tablename = "comment";

	public function CommentData(){
		$this->comment = "";
		$this->ticket_id = "";	
	}

	public function add(){
		$sql = "insert into comment (description, request_id) ";
		$sql .= "values ('$this->description', '$this->request_id')";

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
	
	public function getAll($request_id){
		$sql = "select * from ".self::$tablename. " where request_id=$request_id";
		$query = Executor::doiit($sql);
		return Model::many($query[0],new CommentData());
	}
}
?>