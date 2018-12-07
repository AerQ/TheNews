<?php
 class View{
 	function __construct(){
 	}
 	public function render($name, $arg1 = false,$argum = false){
			require 'views/header.php';
     		require 'views/'.$name.'.php';
     		require 'views/footer.php';
 	}
 }
