<?php

namespace App\Card;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class Card
{

    private $card;

    /**
     * Create card.
     * Method to create a single card and store obnject as an array
     * Return object as an array
     *
     * @param string suit, string rank int value
     * @return array
     */
    public function createCard($suit, $rank, $value): array
    {
        // $this->card["suits"] = $suits;
        // $this->rank["rank"] = $rank;
        // $this->value["value"] = $value;

        $this->card = array(
            "suit" => $suit,
            "rank" => $rank,
            "value" => $value,
        );

        return $this->card;
    }
}
