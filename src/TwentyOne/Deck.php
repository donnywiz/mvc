<?php

namespace App\TwentyOne;

use App\TwentyOne\Card;

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
     * Creats a deck of cards. Iterates through arrays of suits,
     * ranks and values. Receives object and calls method to create card.
     * Pushes object/array to private array deck in class.
     *
     * @param Card card
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
     * Get deck
     * Returns all card objects in array deck.
     *
     * @param none
     * @return array
     */
    public function getDeck(): array
    {
        return $this->deck;
    }

    /**
     * Shuffles deck by calling method shuffle.
     * If len of array deck is less than 52, create new deck.
     *
     * @param Card card
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
     * Draws a signle card from deck and returns as an array
     *
     * @param int numberOfCards
     * @return array
     */
    public function drawCard(int $numberOfCards = 1): array
    {
        $cards = [];

        for ($i = 0; $i < $numberOfCards; $i++) {
            if ($this->deckCount() > 0) {
                $card = array_shift($this->deck);
                array_push($cards, $card);
            } else {
                break;
            }

            return $cards;
        }
    }

    /**
     * Get Deck Count
     * Returns number of cards in deck as an integer
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
