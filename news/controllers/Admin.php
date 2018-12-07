<?php
class Admin extends Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$_SESSION['arg'] = false;
		$this->view->render('admin/index');
	}

	public function deletecurrentnews($params){
		if ($params[0] == null || $params[1] == null)  {
			header("location:" . URL . "admin/");
		}else{
			$_SESSION['arg'] = $this->model->deleteNewsModel($params[0]);
			header("location: " . URL . "admin/deletenews/" . $params[1]);
		}
	}

	public function deleteNews($params){
		//должны быть все записи с сессии
		$_SESSION['arg'] = false;
		//пагинация
		if ($params[0] == null) {
			$page = 1;
		} else {
			$page = $params[0];
		}
		//конец пагинации
		$data = $this->getPage($page);
		$this->view->render('admin/deletenews', $data);
	}



	public function changeNews($params)
	{
		$_SESSION['arg'] = false;
		//пагинация
		if ($params[0] == null) {
			$page = 1;
		} else {
			$page = $params[0];
		}
		//конец пагинации
		$data = $this->getPageforAdm($page);
		$this->view->render('admin/changenews', $data);

	}
  public function sortByDate($params){
	  //должны быть все записи с сессии
	  $_SESSION['arg'] = false;
	  //пагинация
	  if ($params[0] == null) {
		  $page = 1;
	  } else {
		  $page = $params[0];
	  }
	  //конец пагинации
	  $data = $this->getSortDesc($page);
	  $this->view->render('admin/sortbydate', $data);
  }
	public function sortByName($params){
		//должны быть все записи с сессии
		$_SESSION['arg'] = false;
		//пагинация
		if ($params[0] == null) {
			$page = 1;
		} else {
			$page = $params[0];
		}
		//конец пагинации
		$data = $this->getSortName($page);
		$this->view->render('admin/sortbyname', $data);
	}

	public function sortByText($params){
		//должны быть все записи с сессии
		$_SESSION['arg'] = false;
		//пагинация
		if ($params[0] == null) {
			$page = 1;
		} else {
			$page = $params[0];
		}
		//конец пагинации
		$data = $this->getSortText($page);
		$this->view->render('admin/sortbytext', $data);
	}


	public function changeCurrentNews($params)
	{
		//пагинация
		if ($params[0] == null) {
			$id = 1;
		} else {
			$id = $params[0];
		}
		//конец пагинации
		if ($_POST['changeNews']) {
			if (!empty($_POST['news_name']) && !empty($_POST['news_text'])) {
				$_SESSION['arg'] = $this->model->changeCurrentNewsModel($_POST);
			} else {
				$_SESSION['arg'] = false;
			}
			header("location: " . URL . "admin/changecurrentnews/" . $id);
		}
		$this->view->render('admin/changeCurrentNews', $this->model->getNewsById($id));
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
		$this->view->render('admin/shownews', $data);

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

	public function getPageforAdm($page = 1)
	{
		$limit = 5;
		$offset = ($page - 1) * $limit;

		$data['total_pages'] = ceil($this->model->getCountPages() / $limit);
		$data['current_page'] = $page;

		$data['notes'] = $this->model->getNewsByPageAdm($limit, $offset);
		$data['q'] = $this->model->sortdate($limit, $offset);

		return $data;
	}
	public function getSortDesc($page = 1)
	{
		$limit = 5;
		$offset = ($page - 1) * $limit;
		$data['total_pages'] = ceil($this->model->getCountPages() / $limit);
		$data['current_page'] = $page;
		$data['q'] = $this->model->sortdate($limit, $offset);

		return $data;
	}

	public function getSortName($page = 1)
	{
		$limit = 5;
		$offset = ($page - 1) * $limit;
		$data['total_pages'] = ceil($this->model->getCountPages() / $limit);
		$data['current_page'] = $page;
		$data['q'] = $this->model->sortname($limit, $offset);

		return $data;
	}


	public function getSortText($page = 1)
	{
		$limit = 5;
		$offset = ($page - 1) * $limit;
		$data['total_pages'] = ceil($this->model->getCountPages() / $limit);
		$data['current_page'] = $page;
		$data['q'] = $this->model->sorttext($limit, $offset);

		return $data;
	}

	public function createNews(){
		if ($_POST['addnews']) {
			if (!empty($_POST['news_name']) && !empty($_POST['news_text']) && !empty($_FILES['news_img']['name'])) {
				$filePath = $_FILES['news_img']['tmp_name'];
				if ($filePath == 0) {
					$name = md5_file($filePath);
					$image = getimagesize($filePath);
					$extension = image_type_to_extension($image[2]);
					$format = str_replace('jpeg', 'jpg', $extension);
					if (!move_uploaded_file($filePath, 'img/uploads/' . $name . $format)) {
						die('bad file...');
					} else {
						echo 'File was saved';
					}
				} else {
					echo 'Upload error! error=' . $_FILES['news_img']['error'];
				}
				$_SESSION['arg'] = $this->model->createNewsModel($_POST, $name.$format);
			} else {
				$_SESSION['arg'] = false;
			}
			header('location:' . URL . 'admin/createnews');
		}
		$this->view->render('admin/createnews');
	}
}
