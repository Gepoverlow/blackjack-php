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
private string $commentator;

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

public function checkWinner() : void{

$playerScore = $this->player->getScore();
$dealerScore = $this->dealer->getScore();

if ($playerScore > $dealerScore && $playerScore <= 21) {
   $this->commentator = "Player wins!";
  } else if ($playerScore > $dealerScore && $playerScore > 21) {
    $this->commentator = "Dealer wins!";
  } else if ($dealerScore > $playerScore && $dealerScore <= 21) {
    $this->commentator = "Dealer wins!";
  } else if ($dealerScore > $playerScore && $dealerScore > 21) {
    $this->commentator = "Player wins!";
  } else if ($dealerScore === $playerScore) {
    $this->commentator = "Its a tie";
  }
}

public function getCommentator(){

return $this->commentator;

}

public function setCommentator(string $comment){

$this->commentator = $comment;
    
}

}