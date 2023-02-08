<?php
require_once("../controllers/GamesController.php");
$id = $_GET["id"];
$controller = new GamesController;
$game = $controller->readOne($id);
var_dump($game);

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

</main>
</div>