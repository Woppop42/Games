<?php
session_start();
require_once("../conf.php");
define("PAGE_TITLE", "Back-Office");
include("../view/headFront.php");
include("../view/headerFront.php");
if($_SESSION["role"] != 0)
{
    header("Location: Jeux/view/gameList.php");
}
?>

<h1 class="text-center">Espace Administrateur</h1>
