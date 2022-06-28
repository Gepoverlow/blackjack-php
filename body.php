<?php 

require_once "./classes/Blackjack.php";

$player = $game->getPlayer();
$dealer = $game->getDealer();
$deck = $game->getDeck();

if(isset($_POST["player-action-hit"])){

    
if(!$player->hasLost() && !$dealer->hasLost()){
        
echo "Player Hits";
$player->hit($deck);

}

}

if(isset($_POST["player-action-stand"])){



if(!$dealer->hasLost() && !$player->hasLost()){

echo "Player Stands";
$dealer->hit($deck);

}
    
}

if(isset($_POST["player-action-surrender"])){

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
echo $player->getScore();
foreach($player->getHandCards() AS $card){ 
    echo $card->getUnicodeCharacter(true);
 }

?>

</div>

<div id="dealer-score">

<?php 
echo $dealer->getScore();
foreach($dealer->getHandCards() AS $card){ 
    echo $card->getUnicodeCharacter(true);
 }

?>

</div>

<div>

<?php

 if(!$player->hasLost() && !$dealer->hasLost()) { echo "Game is still alive..."; } 

 if($player->hasLost()) { echo "Dealer Wins!"; } 

 if($dealer->hasLost()) { echo "Player Wins!"; } 


?>


</div>
        
<form action="index.php" method="post">

<button name="player-action-hit" type="submit">HIT</button>
<button name="player-action-stand" type="submit">STAND</button>
<button name="player-action-surrender" type="submit">SURRENDER</button>

</form>


</body>
</html>