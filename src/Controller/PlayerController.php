<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class PlayerController extends AbstractController
{

    /**
     * @Route("/card/deck/deal/{players}/{cards}", name="deal_players")
     */
    public function dealPlayers(SessionInterface $session, int $players = 1, int $cards = 1): Response
    {
        $title = "Deal " . $players ." players ". $cards . " cards";

        $playerObject = new \App\Card\Players($players);

        $deck = $session->get('deck');
        $playerObject->addCards($deck, $cards);

        $data = [
            'playername' => $playerObject->showPlayers(),
            'playerhand' => $playerObject->showHand(),
            'numberOfCards' => $deck->deckCount(),
        ];

        return $this->render('players/players.html.twig', [
        'title' => $title,
        'data' => $data,
         ]);
    }
}
