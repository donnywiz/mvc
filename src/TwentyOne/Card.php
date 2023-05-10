<?php

namespace App\TwentyOne;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class Card
{
    private $card;

    /**
     * Creates a single card and store obnject as an array (suit, rank, value)
     * Return object as an array.
     *
     * @param string suit
     * @param string rank
     * @param int value
     * @return array
     */
    public function createCard($suit, $rank, $value): array
    {
        $this->card = array(
            "suit" => $suit,
            "rank" => $rank,
            "value" => $value,
        );

        return $this->card;
    }
}
