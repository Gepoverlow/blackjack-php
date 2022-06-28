<?php 

require_once "./classes/Blackjack.php";

$player = $game->getPlayer();
$dealer = $game->getDealer();
$deck = $game->getDeck();

if(isset($_POST["player-action-hit"])){
        
$player->hit($deck);

if($player->getScore() > 21){

$game->setGameOver(true);

}

}

if(isset($_POST["player-action-stand"])){

$dealer->hit($deck);
echo $game->checkWinner();
$game->setGameOver(true);
    
}

if(isset($_POST["player-action-surrender"])){

unset($_SESSION["Blackjack"]);

$game = new Blackjack();
$_SESSION["Blackjack"] = $game;

$player = $game->getPlayer();
$dealer = $game->getDealer();
$deck = $game->getDeck();
        
}

if(isset($_POST["player-action-restart"])){

unset($_SESSION["Blackjack"]);
    
$game = new Blackjack();
$_SESSION["Blackjack"] = $game;
    
$player = $game->getPlayer();
$dealer = $game->getDealer();
$deck = $game->getDeck();
            
}

?>

<body>

<div id="player-score"> 
    
<?php 
echo '<span> Player Score:' . $player->getScore() . '</span>';
foreach($player->getHandCards() AS $card){ 
    echo $card->getUnicodeCharacter(true);
 }
?>

</div>

<div id="dealer-score">

<?php 
echo '<span> Dealer Score:' . $dealer->getScore() . '</span>';
foreach($dealer->getHandCards() AS $card){ 
    echo $card->getUnicodeCharacter(true);
 }
?>

</div>

<div>

<?php

if($game->getGameover()){

echo "Game is over! Restart to keep playing";
include_once "game-over.php";
    
} elseif(!$game->getGameOver()){

echo "Game is still alive...";
include_once "game-alive.php";

}


?>





</body>
</html>