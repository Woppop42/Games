<?php
require("../conf.php");
require_once("../controllers/UsersController.php");
$controller = new UsersController;
if(isset($_POST["submit"])){
$user = $controller->addUser($_POST["email"], $_POST["password"], $_POST["pseudo"]);}
define("PAGE_TITLE", "Nouvel Utilisateur");
include("headFront.php");
include("headerFront.php");

?>

<form type="submit" method="post">
<div class="mb-3">
    <label for="pseudo" class="form-label">Pseudo</label>
    <input type="text" class="form-label" name="pseudo" id="pseudo">
</div>
<div class="mb-3">
    <label for="email" class="form-label">Adresse Email</label>
    <input type="text" class="form-label" name="email" id="email">
</div>
<div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-label" name="password" id="password">
    <br>
    <button class="btn btn-success" name="submit">Envoyer</button>
</div>
</form>