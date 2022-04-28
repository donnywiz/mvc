<?php

namespace App\Card;

use App\Card\Card;

// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\Routing\Annotation\Route;

class Deck
{

    private $cards = [];


    public function __construct()
    {
        $this->cards = [];
    }

    /**
    * Create deck.
    * Iterare through list to create suit/rank/value for each card.
    *
    * @param none
    * @return void
    */
    public function createDeck(Card $deck): void
    {
        $suits = array('clubs', 'diamonds', 'hearts', 'spades');
        $ranks = array('2', '3', '4', '5', '6', '7', '8', '9', '10', 'jack', 'queen', 'king', 'ace');
        $values = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);

        for ($i = 0; $i < count($suits); $i++) {
            for ($j = 0; $j < count($ranks); $j++) {
                $this->cards = $deck->suits[$i];
                $this->cards = ranks[$j];
                $deck->value[$j];
            }
        }
    }

    public function showDeck()
    {
        return $this->cards;
    }

    /**
     * Create deck.
     * Add text here.
     *
     * @param none
     * @return void
     */
    public function shuffleDeck()
    {

    }

}
