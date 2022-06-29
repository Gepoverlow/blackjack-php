<?php
declare(strict_types=1);

require_once "./classes/Player.php";

class Dealer extends Player{

private const MIN_SCORE_DEALER = 15;
private const HIDDEN_CARD_UNICODE = "&#x1F0A0";

public function __construct(Deck $deck){

parent::__construct($deck);

}

public function hit(Deck $deck){

if($this->getScore() < self::MIN_SCORE_DEALER) {

do{

parent::hit($deck);
        
} while($this->getScore() < self::MIN_SCORE_DEALER);
        
}

}

public function printHidden(){

return self::HIDDEN_CARD_UNICODE;

}

}