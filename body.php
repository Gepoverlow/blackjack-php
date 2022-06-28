<?php 

require_once "./classes/Blackjack.php";

$player = $game->getPlayer();
$dealer = $game->getDealer();
$deck = $game->getDeck();

if(isset($_POST["player-action-hit"])){

// if(!$player->hasLost() && !$dealer->hasLost()){
        
$player->hit($deck);

}

//}

if(isset($_POST["player-action-stand"])){

// if(!$dealer->hasLost() && !$player->hasLost()){

$dealer->hit($deck);

}
    
//}

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

 if(!$player->hasLost() && !$dealer->hasLost()) { 

echo "Game is still alive...";
include_once "game-alive.php";

 } elseif($player->hasLost() || $dealer->hasLost()){

echo "Game is dead! Restart to keep playing";
include_once "game-dead.php";

 }

//  if($player->hasLost()) { echo "Dealer Wins!"; } 

//  if($dealer->hasLost()) { echo "Player Wins!"; } 


?>





</body>
</html>