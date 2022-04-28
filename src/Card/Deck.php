<?php

namespace App\Card;

use App\Card\Card;

// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\Routing\Annotation\Route;

class Deck
{

    private $deck = [];


    /**
     * Constructor method to create an empty array deck
     *
     * @param none
     * @return void
     *
     */
    public function __construct()
    {
        $this->deck = [];
    }



    /**
     * Create deck.
     * Method to create a deck of cards. Iterates through arrays of suits,
     * ranks and values. Receives object and calls method to create card.
     * Pushes object/array to private array deck in class.
     *
     * @param object
     * @return void
     */
    public function createDeck(Card $card): void
    {
        $suits = array('clubs', 'diamonds', 'hearts', 'spades');
        $ranks = array('2', '3', '4', '5', '6', '7', '8', '9', '10', 'jack', 'queen', 'king', 'ace');
        $values = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);

        for ($i = 0; $i < count($suits); $i++) {
            for ($j = 0; $j < count($ranks); $j++) {

                $object = $card->createCard($suits[$i], $ranks[$j], $values[$j]);

                array_push($this->deck, $object);
            }
        }
    }

    /**
     * Show deck.
     * Method to return all objects in array deck.
     *
     * @param none
     * @return void
     */
    public function showDeck(): array
    {
        return $this->deck;
    }

    /**
     * Shuffle deck.
     * Method to shuffle deck.
     *
     * @param none
     * @return void
     */
    public function shuffleDeck(): void
    {
        if (count($this->deck) < 51) {
            echo "cant shuffle deck, too few cards";
        }
        else {
            shuffle($this->deck);
        }
    }

}
