<?php 

require_once "./classes/Blackjack.php";


$player = $game->getPlayer();
$dealer = $game->getDealer();
$deck = $game->getDeck();

if(isset($_POST["player-action-hit"])){
        
$player->hit($deck);

if($player->getScore() > 21){

$game->setGameOver(true);
$game->setCommentator("Went too High! Dealer Wins");

}

$dealer->printHidden();

}

if(isset($_POST["player-action-stand"])){

$dealer->hit($deck);
$game->checkWinner();
$game->setGameOver(true);
$game->getPlayer()->setPlayerHasStood(true);
    
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

<div id="container-game">

<div id="container-players">

<div id="player-score"> 
<?php 
echo '<span> Player Score: ' . $player->getScore() . '</span>';
?>
<div id="player-cards">
<?php
foreach($player->getHandCards() AS $card){ 
echo $card->getUnicodeCharacter(true);
 }
?>
</div>
</div>

<div id="dealer-score">
<?php 

if(!$game->getPlayer()->getPlayerHasStood()){

echo '<span> Dealer Score: ' . $game->getDealer()->getHandCards()[0]->getValue() . '</span>';

} elseif($game->getPlayer()->getPlayerHasStood()){

echo '<span> Dealer Score: ' . $dealer->getScore() . '</span>';

}

?>
<div id="dealer-cards">
<?php

if(!$game->getPlayer()->getPlayerHasStood()){

echo $game->getDealer()->getHandCards()[0]->getUnicodeCharacter(true);
echo '<span style="color: %s; font-size: clamp(8rem, 9vw, 10rem);">' . $game->getDealer()->printHidden() . '</span>';

} elseif ($game->getPlayer()->getPlayerHasStood()){

    foreach($dealer->getHandCards() AS $card){ 
    echo $card->getUnicodeCharacter(true);

}

 }
?>
</div>
</div>

</div>

<div>
<?php
if($game->getGameover()){
echo '<span class="game-state-message">' . "Game is over! Restart to keep playing" . '</span>';
include_once "game-over.php";   
} elseif(!$game->getGameOver()){
echo '<span class="game-state-message">' . "Game is still alive..." . '</span>';
include_once "game-alive.php";
}
?>


<div>
<?php 
if($game->getGameOver()){
echo '<h2>' . $game->getCommentator() . '</h2>';
}
?>
</div>

</div>



</body>
</html>