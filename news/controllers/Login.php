<?php

class Login extends Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function index(){
		$_SESSION['argum'] = false;
		$this->view->render('login');
	}
	public function success(){
		$this->view->render('success');
	}
}