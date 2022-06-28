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

}

if(isset($_POST["player-action-stand"])){

$dealer->hit($deck);
$game->checkWinner();
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

<div id="container-game">

<div id="container-players">

<div id="player-score"> 
<?php 
echo '<span> Player Score:' . $player->getScore() . '</span>';
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
echo '<span> Dealer Score:' . $dealer->getScore() . '</span>';
?>
<div id="dealer-cards">
<?php
foreach($dealer->getHandCards() AS $card){ 
echo $card->getUnicodeCharacter(true);
 }
?>
</div>
</div>

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