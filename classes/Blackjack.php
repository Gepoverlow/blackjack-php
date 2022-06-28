<?php
declare(strict_types=1);

require './classes/Deck.php';
require './classes/Player.php';
require './classes/Dealer.php';

class Blackjack{

private Player $player;
private Dealer $dealer;
private Deck $deck;
private bool $gameOver;

public function __construct(){

$this->deck = new Deck(); 
$this->deck->shuffle();
$this->player = new Player($this->deck);
$this->dealer = new Dealer($this->deck);
$this->gameOver = false;

}

public function getPlayer() : Player {

return $this->player;

}

public function getDealer() : Player {

return $this->dealer;

}

public function getDeck() : Deck {

return $this->deck;

}

public function getGameOver() : bool {

return $this->gameOver;

}

public function setGameOver(bool $state) : void {

$this->gameOver = $state;
    
}

public function checkWinner() : string{

$playerScore = $this->player->getScore();
$dealerScore = $this->dealer->getScore();

if ($playerScore > $dealerScore && $playerScore <= 21) {
   return "Player wins!";
  } else if ($playerScore > $dealerScore && $playerScore > 21) {
    return "Dealer wins!";
  } else if ($dealerScore > $playerScore && $dealerScore <= 21) {
    return "Dealer wins!";
  } else if ($dealerScore > $playerScore && $dealerScore > 21) {
    return "Player wins!";
  } else if ($dealerScore === $playerScore) {
   return "Its a tie";
  }
}

}