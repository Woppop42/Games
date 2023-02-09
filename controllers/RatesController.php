<?php
require_once("../models/Rates.php");

class RatesController {
    public function vote(float $rate, int $game_id)
        {
            global $pdo;
            $sql = "INSERT INTO Rates (rate, id)
            VALUES (:rate, :game_id)";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(":rate", $rate);
            $statement->bindParam(":game_id", $game_id);
            $statement->execute();
            
        }
}