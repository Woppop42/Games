<?php
require_once("../controllers/UsersController.php");
if(isset($_POST["logout"]))
  {
    $controller = new UsersController;
    $controller->logOut();
  }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../view/gameList.php">Les jeux</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../view/createUser.php">S'inscrire</a>
        </li>
        <?php if(!isset($_SESSION["pseudo"])){
        echo "<li class='nav-item'>
          <a class='nav-link active' href='../view/connexion.php'>Connexion</a>
        </li>"; } ?>
        <?php if(isset($_SESSION["pseudo"])){
        echo "<li class='nav-item'>
          <form method='post' type='submit'>
          <button  class='btn btn-warning' name='logout'>Déconnexion</a>
          </form>
        </li>";} ?>
        
      </ul>
    </div>
  </div>
</nav>