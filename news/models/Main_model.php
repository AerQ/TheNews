<?php
class Main_model extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function all(){
		$stmt = $this->db->prepare("SELECT * FROM news ORDER BY news_time_add DESC");
		$stmt->execute();
		return $stmt->fetchAll();
	}
	public function getCountPages()
	{
		return $this->db->query("SELECT COUNT(id) FROM news")->fetchColumn();
	}

	public function getNewsByPage($limit, $offset)
	{
		$stmt = $this->db->prepare("SELECT * FROM news ORDER BY news_time_add DESC LIMIT $offset, $limit");
		$stmt->execute();
		return $stmt->fetchAll();
	}
}