<?php
session_start();
require_once("../controllers/GamesController.php");
$controller = new GamesController;
$list = $controller->readAll();


define("PAGE_TITLE", "Liste des jeux");
include("headFront.php");
include("headerFront.php");
var_dump($_SESSION);
?>
<div class="background">
<main>
    <h1 class="text-center">Liste de tous les jeux</h1>
    <div class="card">
    <?php foreach($list as $game){ ?>
        <form action ="" method="get">
        <div class="image">
        <img src="../assets/css/img/<?= $game->image ?>" alt="">
        </div>
        <div class="card-body">
            <div class="card-title">
                <h4><?= $game->name ?></h4>
            </div>
            <div class="card-date">
                <p><?= $game->date_sortie ?></p>
            </div>
            <div class="card-studio">
                <p><?php foreach($game->s_name as $studio){
                    echo $studio->s_name;
                } ?></p>
            </div>
            <div class="card-genre">
                <p><?= $game->genre ?></p>
            </div>
            <div class="card-button">
                <a href="oneGame.php?id=<?= $game->id ?>" class="btn btn-danger" type="submit" name="submit"><?= var_dump($game->id) ?></a>
            </div>
        </div>
    </div> 
            </form>
    <?php } ?>
</main>
            </div>  