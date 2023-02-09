<?php
require_once("../models/Rates.php");

class RatesController {
    public function vote(float $rate, int $game_id, int $id_user)
        {
            global $pdo;
            $sql = "INSERT INTO Rates (rate, id, id_user)
            VALUES (:rate, :game_id, :id_user)";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(":rate", $rate);
            $statement->bindParam(":game_id", $game_id);
            $statement->bindParam(":id_user", $id_user);
            $result = $statement->execute();

            return $result;
            
        }
    public function voteStatus(bool $status)
        {
            $status = true;
            return $status;
        }
}