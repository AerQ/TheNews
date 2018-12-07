<?php
class Bootstrap
{
	function __construct()
	{
		$url = $_GET['url'];
		$url = htmlspecialchars($url);
		$url = trim($url);
		$url = explode('/', $url);
		if (empty($url[0])) {
			require 'controllers/main.php';
			$controller = new Main();
			$controller->loadModel('main');
		} else {
			$path = 'controllers/' . $url[0] . '.php';
			if (file_exists($path)) {
				require $path;
				$controller = new $url[0];
				$controller->loadModel($url[0]);
			} else {
				require 'controllers/main.php';
				$controller = new Main();
				$controller->loadModel('main');
			}
		}
		//определяем параметр
		$c_url = count($url);
		for ($i = 2; $i < $c_url; $i++) {
			$params[] = $url[$i];
		}
		//определяем метод
		if (empty($url[1])) {
			$controller->index();
		} else {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($params);
			} else {
				$controller->index();
			}
		}
	}
}