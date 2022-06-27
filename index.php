<?php

declare(strict_types=1);

require './classes/Blackjack.php';

session_start();

$game;

if(!isset($_SESSION["Blackjack"])){

    echo "NO BLACKJACK SESSION FOUND";
    $game = new Blackjack();
    $_SESSION["Blackjack"] = $game;  

} else {

    echo "BLACKJACK GAME FOUND IN SESSION";
    $game = $_SESSION["Blackjack"];
    
}




// $game = new Blackjack();

// $player = $game->getPlayer();
// $dealer = $game->getDealer();
// $deck = $game->getDeck();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        
</body>
</html>