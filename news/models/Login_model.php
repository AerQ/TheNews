<?php
class Login_model extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function checkUser(){
		$stmt = $this->db->prepare("SELECT * FROM users WHERE  user_name ");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}