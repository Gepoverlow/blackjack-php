<?php
declare(strict_types=1);

require_once "./classes/Player.php";

class Dealer extends Player{

private const MIN_SCORE_DEALER = 15;

public function __construct(Deck $deck){

parent::__construct($deck);

}

public function hit(Deck $deck){

do{

parent::hit($deck);

} while($this->getScore() < self::MIN_SCORE_DEALER);

}

}