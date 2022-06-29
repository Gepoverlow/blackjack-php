<?php

declare(strict_types=1);

require './classes/Blackjack.php';

session_start();

if(!isset($_SESSION["Blackjack"])){

    $game = new Blackjack();
    $_SESSION["Blackjack"] = $game;  
    
    include_once "header.php";
    include_once "body.php";

} elseif(isset($_SESSION["Blackjack"])) {

    $game = $_SESSION["Blackjack"];

    include_once "header.php";
    include_once "body.php";
    
}

?>



