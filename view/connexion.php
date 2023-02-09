<?php
session_start();
require_once("../conf.php");
require_once("../controllers/UsersController.php");
define("PAGE_TITLE", "Connexion");
include("headFront.php");
include("headerFront.php");
$controller = new UsersController;
if(isset($_POST["submit"])){
$connexion = $controller->login($_POST["pseudo"], $_POST["password"]);
}
?>
<h1 class="text-center">Se connecter</h1>
<div class="container text-center">
<form type="submit" method="post">
<div class="mb-3">
    <label for="pseudo" class="form-label">Votre Pseudo</label>
    <input type="text" class="form-label" name="pseudo" id="pseudo">
</div>
<div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-label" name="password" id="password">
    <br>
    <button class="btn btn-success" name="submit">Se connecter</button>
</div>
</form>
</div>