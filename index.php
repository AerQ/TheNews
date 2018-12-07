<?php
session_start();
require 'config/config.php';
require 'libs/Controller.php';
require 'libs/View.php';
require 'libs/Database.php';
require 'libs/Model.php';
require 'libs/Bootstrap.php';
$app = new Bootstrap();