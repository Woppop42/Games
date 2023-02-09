<?php
session_start();
require_once("../controllers/GamesController.php");
require_once("../controllers/RatesController.php");
$id = $_GET["id"];
$controller = new GamesController;
$game = $controller->readOne($id);
$rateController = new RatesController;
if(isset($_POST["submit"])){
$rate = $rateController->vote($_POST["note"], $id, $_SESSION["id_user"]);
$_SESSION["status"] == false;
$statusController = new RatesController;
$status = $statusController->voteStatus($_SESSION["status"]); }
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";

define("PAGE_TITLE", $game->name);
include("headFront.php");
include("headerFront.php");
?>
<div class="background">
<main>
    <h1 class="text-center">Toutes les informations sur <?= $game->name ?> </h1>
    <h5>Genre : <?= $game->genre  ?></h5>
    <h5>Date de sortie : <?= $game->date_sortie ?> </h5>
    <h5>La note globale des internautes : <?= $game->rate ?></h5>
    <h5>Le nom du studio : <?php foreach($game->studio as $studio) { echo $studio->s_name; }?></h5>
    <h5>Pays d'origine du studio : <?php foreach($game->studio as $studio){echo $studio->nationality;} ?></h5>
    <?php if($status == false){
        echo "<h5>Donne ta note entre 1 et 10 : <br>
        <form method='post' type='submit'>
        <label for='note' class='form-label'>Votre note</label>
        <input type='float' class='form-label' name='note' id='note'>
        <button class='btn btn-success' name='submit'>Votez</button>
        </form></h5>
</main>
</div>"; }?>