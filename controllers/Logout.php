<?php
/**
 * Created by PhpStorm.
 * User: Остап
 * Date: 16.11.2018
 * Time: 11:32
 */

class Logout extends Controller
{
	function __construct()
	{
		parent::__construct();
	}
		public function index(){
		$this->view->render('logout');
		}

}