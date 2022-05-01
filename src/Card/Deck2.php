<?php

namespace App\Card;
use App\Card\Card;

class Deck2 extends Deck
{

    private $deck2;


    /**
     * Constructor method to create an empty array deck
     *
     * @param none
     * @return void
     *
     */
    public function __construct(Card $card)
    {
        $this->deck2 = [];

        parent::createDeck($card);

        $this->deck2 = parent::getDeck();

        $harlequin = [
            "suit" => 'harlequin',
            "rank" => '',
            "value" => '',
        ];
        $arr = [$harlequin, $harlequin];

        $i = 0;
        do {
            $this->deck2[] = $harlequin;
            $i++;
        } while ($i < 2);

    }

    /**
     * Create deck2.
     *
     * @param none
     * @return void
     */
    public function addDeck(): void
    {

        $this->deck2 = [];
        $this->deck2 = parent::createDeck();
        $harlequins = ['harlequin', 'harlequin'];
        array_push($this->deck2, $harlequins);
        var_dump($this->deck2);
    }

    public function getDeck(): array
    {
        return $this->deck2;
    }
}
