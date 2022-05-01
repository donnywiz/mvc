<?php

namespace App\Card;
use App\Card\Card;

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

        $this->deck = [];

        $suits = array('clubs', 'diamonds', 'hearts', 'spades');
        $ranks = array('2', '3', '4', '5', '6', '7', '8', '9', '10', 'jack', 'queen', 'king', 'ace');
        $values = array(2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14);

        for ($i = 0; $i < count($suits); $i++) {
            for ($j = 0; $j < count($ranks); $j++) {

                $object = $card->createCard($suits[$i], $ranks[$j], $values[$j]);

                array_push($this->deck, $object);
            }
        }
    }

    /**
     * Get deck.
     * Method to return all objects in array deck.
     *
     * @param none
     * @return void
     */
    public function getDeck(): array
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
    public function shuffleDeck(Card $card): void
    {
        if ($this->deckCount() < 52) {
            $this->createDeck($card);
            shuffle($this->deck);
        } else {
            shuffle($this->deck);
        }
    }

    /**
     * Draw card from deck.
     * Method to draw a signle card from deck.
     *
     * @param none
     * @return array
     */
    public function drawCard(int $numberOfCards = 1): array
    {
        $cards = [];

        for ($i = 0; $i < $numberOfCards; $i++) {

            if ($this->deckCount() == 0) {
                break;
            } else {
                $card = array_shift($this->deck);
                array_push($cards, $card);
            }
        }
        return $cards;
    }

    /**
     * Get Deck Count
     * Public method get card count
     *
     * @param none
     * @return int
     */
    public function deckCount(): int
    {
        $deckCount = count($this->deck);

        return $deckCount;
    }
}
