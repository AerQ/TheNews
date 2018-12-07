<?php
class Main extends Controller{
	function __construct()
	{
		parent::__construct();
	}
	public function index($params =false){
		if ($params[0] == null) {
			$page = 1;
		} else {
			$page = $params[0];
		}
		//конец пагинации
		$data = $this->getPage($page);
		$this->view->render('/main', $data);

	}
	public function showNews($params)
	{
		//пагинация
		if ($params[0] == null) {
			$page = 1;
		} else {
			$page = $params[0];
		}
		//конец пагинации
		$data = $this->getPage($page);
		$this->view->render('/main', $data);

	}

	public function getPage($page = 1)
	{
		$limit = 5;
		$offset = ($page - 1) * $limit;

		$data['total_pages'] = ceil($this->model->getCountPages() / $limit);
		$data['current_page'] = $page;

		$data['notes'] = $this->model->getNewsByPage($limit, $offset);
		return $data;
	}
}