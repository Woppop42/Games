<?php
session_start();
require_once("../controllers/UsersController.php");
$controller = new UsersController;
$rates = $controller->displayRates($_SESSION["id_user"]);
var_dump($rates);
