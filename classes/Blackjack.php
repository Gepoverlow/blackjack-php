<?php
declare(strict_types=1);

require './classes/Deck.php';
require './classes/Player.php';

class Blackjack{

public Player $player;
private Player $dealer;
private Deck $deck;

public function __construct(){

$this->deck = new Deck(); 
$this->player = new Player($this->deck);
$this->dealer = new Player($this->deck);
$this->deck->shuffle();

}

public function getPlayer() : Player {}

public function getDealer() : Dealer {}

public function getDeck() : Deck {}

}