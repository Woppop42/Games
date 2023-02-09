<?php
require_once("../models/Games.php");

class GamesController 
{
    public function readAll()
    {
        global $pdo;
        $sql = "SELECT id, name, genre, date_sortie, image FROM Games";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $list = $statement->fetchAll(PDO::FETCH_CLASS, "Games");
        foreach($list as $games)
        {
            $this->loadStudiosFromGames($games);
        }

        return $list;
    }

    public function loadStudiosFromGames(Games $games)
    {
        global $pdo;
        $sql = "SELECT s_name FROM Studios WHERE Studios.id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id", $games->id, PDO::PARAM_INT);
        $statement->execute();
        $games->s_name = $statement->fetchAll(PDO::FETCH_CLASS, "Studios");
    }

    public function readOne(int $id): Games
    {
        global $pdo;
        $sql = "SELECT * FROM Games  WHERE Games.id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Games");
        $result = $statement->fetch();

        $sql = "SELECT * FROM Studios WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        $studio = $statement->fetchAll(PDO::FETCH_CLASS, "Studios");

        $result->studio = $studio;

        $this->loadStudiosFromGames($result);

        return $result;

    }
}