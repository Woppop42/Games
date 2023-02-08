<?php
require_once("../conf.php");
require_once("Studios.php");

class Games 
{
    public int $id;
    public string $name;
    public string $genre;
    public string $date_sortie;
    public string $image;
    public int $rate;
    public int $s_id;
    public array $s_name;
    public ?array $studio;

    public function __construct(){}


}