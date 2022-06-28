<?php 

$player = $game->getPlayer();
$dealer = $game->getDealer();
$deck = $game->getDeck();

if(isset($_POST["player-action-hit"])){

echo "Player Hits";

}

if(isset($_POST["player-action-stand"])){

echo "Player Stands";
    
}

if(isset($_POST["player-action-surrender"])){

echo "Player Surrenders";
        
}

?>


<body>
        
<form action="index.php" method="post">

<button name="player-action-hit" type="submit">HIT</button>
<button name="player-action-stand" type="submit">STAND</button>
<button name="player-action-surrender" type="submit">SURRENDER</button>

</form>


</body>
</html>