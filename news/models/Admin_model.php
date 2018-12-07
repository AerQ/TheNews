<?php
class Admin_model extends Model{
	function __construct()
	{
		parent::__construct();
	}

	public function deleteNewsModel($id){
		$state = $this->db->prepare("DELETE FROM news WHERE id = :id");
		if ($state->execute(['id' => $id])){
			return true;
		}

		return false;
	}

	public function changeCurrentNewsModel($data)
	{
//		var_dump($data);
		$state = $this->db->prepare("UPDATE news SET news_name = :news_name, news_text = :news_text WHERE id = :id");
		if ($state->execute([
			'id' => $data['id'],
			'news_name' => $data['news_name'],
			'news_text' => $data['news_text']
		])) {
			return true;
		}
		return false;
	}

	public function getNewsById($id)
	{
		if (!$id) {
			return false;
		} else {
			$state = $this->db->prepare("SELECT * FROM news WHERE id = :id ");
			$state->execute(['id' => $id]);
			return $state->fetchAll();
		}
	}

	public function createNewsModel($data, $file)
	{
		$statement = $this->db->prepare("INSERT INTO news(id, news_name, news_text, news_img) VALUES(:id, :news_name, :news_text, :news_img)");
		if ($statement->execute(array(
			'id' => NULL,
			'news_name' => $data['news_name'],
			'news_text' => $data['news_text'],
			'news_img' => $file
		))) {
			return true;
		} else {
			return false;
		}
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
	public function getNewsByPageAdm($limit, $offset)
	{
		$stmt = $this->db->prepare("SELECT * FROM news  LIMIT $offset, $limit");
		$stmt->execute();
		return $stmt->fetchAll();
	}
	public function sortDate($limit, $offset){
		$stmt = $this->db->prepare("SELECT * FROM news ORDER BY news_time_add DESC LIMIT $offset, $limit");
		$stmt->execute();
		return $stmt->fetchAll();
	}
	public function sortName($limit, $offset){
		$stmt = $this->db->prepare("SELECT * FROM news ORDER BY news_name ASC LIMIT $offset, $limit");
		$stmt->execute();
		return $stmt->fetchAll();
	}
	public function sortText($limit, $offset){
		$stmt = $this->db->prepare("SELECT * FROM news ORDER BY news_text ASC LIMIT $offset, $limit");
		$stmt->execute();
		return $stmt->fetchAll();
	}

}