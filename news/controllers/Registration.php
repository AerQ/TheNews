<?php
/**
 * Created by PhpStorm.
 * User: Остап
 * Date: 10.11.2018
 * Time: 16:16
 */

class Registration extends Controller
{
		function __construct(){
		parent::__construct();
	}
	public function index(){
		$_SESSION['argum'] = false;
		$this->view->render('registration');
	}
	public function registr(){
		if (isset($_POST['submit'])){
				if (!empty($_POST['user_name']) && !empty($_POST['user_password']) && !empty($_POST['re_password'])) {
					$_SESSION['argum'] = $this->model->createUserModel($_POST);
				} else {
					$_SESSION['argum'] = false;
				}
				header('location' . URL . 'registration');
			}
		$this->view->render('registration');

	}
}