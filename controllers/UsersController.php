<?php
require_once("../models/Users.php");
require_once("../models/Rates.php");

class UsersController {

    public function addUser(string $email, string $password, string $pseudo)
    {
        // Vérification de l'email : 
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return [
                "success" => false,
                "message" => "Email incorrect !"
            ];
        // Vérification du mot de passe :
        if(strlen($password) < 8) 
        {
            return [
                "success" => false,
                "message" => "Votre mot de passe doit contenir au moins 8 caractères !"
            ];
        }
        // Vérification de la force du mot d epasse avec une Regex (Au moins 1 majuscule, 1 caractère spécial et 1 chiffre): 
            if(!preg_match("~^\S*(?=\S*[a-zA-Z])(?=\S*[0-9])(?=\S*[\W])\S*$~", $password)){
                return [
                    "succes" => false,
                    "message" => "Le mot de passe doit contenir au moins une lettre, un chiffre et un caractère spécial !"
                ];
            }
        }
        global $pdo;
        $sql = "INSERT INTO User (email, password, pseudo, role)
        VALUES (:email, :password, :pseudo, 1)";
        $statement = $pdo->prepare($sql);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":pseudo", $pseudo);
        $statement->execute();

        return [
            "success" => true,
            "message" => "Compte utilisateur créé !"
        ];


    }
    public function login(string $pseudo, string $password)
    {
        global $pdo;
        $sql = "SELECT * FROM User WHERE :pseudo = pseudo";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":pseudo", $pseudo);
        $statement->execute();

        // Vérification de la présence du compte : 
        if($statement->rowCount() > 0)
            {
                $statement->setFetchMode(PDO::FETCH_CLASS, "Users");
                $account = $statement->fetch();
                // Vérification du mot de passe : 
                if(password_verify($password, $account->password))
                {
                    $_SESSION["pseudo"] = $account->pseudo;
                    $_SESSION["role"] = $account->role;
                    $_SESSION["status"] = $account->status;
                    $_SESSION["id_user"] = $account->user_id;
                    if($account->role == 0)
                        {
                            header("Location: /Jeux/admin/admin.php");
                        } else{
                            header("Location: /Jeux/view/gameList.php");
                                }
                    
                    
                } else {
                    return [
                        "succes" => false,
                        "message" => "Mot de passe incorrect !"
                    ];
                }
            }else{
                return [
                    "success" => false,
                    "message" => "Cet utilisateur n'existe pas !" 
                ];
            }

    }
    public function logOut()
        {
            
            session_destroy();
            
        }
    public function displayRates(int $user_id)
        {
            global $pdo;
            $sql ="SELECT Rates.rate, Rates.id, Rates.user_id
                    FROM Rates JOIN Games ON Rates.id = Games.id
                    WHERE :user_id = Rates.user_id";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(":user_id", $user_id);
            $statement->execute();
            $rates = $statement->fetchAll(PDO::FETCH_CLASS, "Rates");

            return $rates;

        }
}