<?php
declare(strict_types=1);

class Player{

private const MAX_SCORE = 21;

private array $cards;
private bool $lost;
private bool $playerHasStood;

public function __construct(Deck $deck){

$this->lost = false;
$this->playerHasStood = false;
$this->cards = [];
array_push($this->cards, $deck->drawCard(), $deck->drawCard());

}

public function hit(Deck $deck){

array_push($this->cards, $deck->drawCard());

if($this->getScore() > self::MAX_SCORE) { 

$this->lost = true;
    
}

}

public function surrender(){

$this->lost = true;

}

public function getScore() : int {
    
$score = 0;

foreach($this->cards as $card){
$score += $card->getValue();
}

return $score;

}

public function hasLost(){

return $this->lost;

}

public function getHandCards(){

return $this->cards;

}

public function getPlayerHasStood(){

return $this->playerHasStood;

}

public function setPlayerHasStood(bool $standStatus){

$this->playerHasStood = $standStatus;
    
}

}