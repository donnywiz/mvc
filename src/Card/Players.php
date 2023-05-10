<?php

namespace App\Card;

use App\Card\Deck;

class Players
{
    private $players = [];
    private $cardhand;

    /**
     *
     *
     *
     */
    public function __construct(int $numberOfPlayers = 1)
    {
        for ($i = 1; $i < $numberOfPlayers + 1; $i++) {
            $name = "Player " . $i;
            array_push($this->players, $name);
            $this->cardhand = array(
                $name => []
            );
            // var_dump($this->cardhand);
        }
    }

    /**
     *  Add cards to hand
     *
     * @param array
     * @return void
     */
    public function addCards(Deck $add, int $numberOfCards): void
    {
        foreach ($this->players as $player) {
            $cards = $add->drawCard($numberOfCards);
            $this->cardhand[$player] = $cards;
        }
        // var_dump($this->cardhand);
    }

    /**
     * Show all cards in hand
     *
     * @param none
     * @return array
     */
    public function showHand(): array
    {
        ksort($this->cardhand);
        return $this->cardhand;
    }

    /**
     * Show all players
     *
     * @param none
     * @return array
     */
    public function showPlayers(): array
    {
        return $this->players;
    }
}
