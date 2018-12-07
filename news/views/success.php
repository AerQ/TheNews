<?php
session_start();
if (isset($_SESSION["username"])){
	echo '<h3>Добро пожаловать, уважаемый - '.$_SESSION["username"].'</h3>';
	echo '<meta http-equiv="refresh" content="3;URL=http://news/main" >';

	echo '<br /><br /><a href="/login">Logout</a>';
}else{
	header("location:". URL . "logout/index");
}