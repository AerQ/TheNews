<?php
class Registration_model extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function createUserModel($data){
		$statement = $this->db->prepare("INSERT INTO users(id, user_name, user_password, re_password) VALUES(:id, :user_name, :user_password, :re_password)");
		if ($statement->execute(array(
			'id' => NULL,
			'user_name' => $data['user_name'],
			'user_password' => $data['user_password'],
			're_password' => $data['re_password']
		))) {
			return true;
		} else {
			return false;
		}
	}
}