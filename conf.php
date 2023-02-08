<?php
$DB_HOST = "127.0.0.1";
$DB_NAME = "games";
$DB_USER= "root";
$DB_PASSWORD= "root";
$pdo = new PDO("mysql:host=$DB_HOST;port=8889;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
?>