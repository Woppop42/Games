<?php
require_once("../models/Rates.php");

class RatesController {
    public function vote(float $rate, int $game_id, int $user_id)
        {
            global $pdo;
            $sql = "INSERT INTO Rates (rate, id, user_id)
            VALUES (:rate, :game_id, :user_id)
            WHERE :game_id AND :user_id NOT EXISTS (SELECT game_id, user_id FROM Rates WHERE :game_id != game_id AND :user_id != user_id)";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(":rate", $rate);
            $statement->bindParam(":game_id", $game_id);
            $statement->bindParam(":user_id", $user_id);
            $result = $statement->execute();

            return $result;
            
        }
    public function voteStatus($status): bool
        {
            $status = true;
            return $status;
        }
}