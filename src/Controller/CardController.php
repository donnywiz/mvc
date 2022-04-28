<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    /**
     * @Route("/card", name="card")
     */
    public function showCard(): Response
    {
        $title = "Black Jack";
        $card = new \App\Card\Card();

        $deck = new \App\Card\Deck();
        $deck->createDeck($card);
        $data = [
            'showDeck' => $deck->showDeck()
        ];


        return $this->render('card.html.twig', [
            'title' => $title,
            'deck' => $deck,
        ]);
    }

    /**
     * @Route("/card/deck", name="deck")
     */
    public function showDeck(): Response
    {
        $title = "Deck";

        return $this->render('card.html.twig', [
            'title' => $title,
        ]);
    }

    /**
     * @Route("/card/deck/shuffle", name="shuffle")
     */
    public function shuffleCards(): Response
    {
        $title = "Shuffle";

        return $this->render('card.html.twig', [
            'title' => $title,
        ]);
    }

    /**
     * @Route("/card/deck/draw", name="draw")
     */
    public function drawCard(): Response
    {
        $title = "Draw";

        return $this->render('card.html.twig', [
            'title' => $title,
        ]);
    }

    /**
     * @Route("/card/deck/draw/{number}", name="draw_number", requirements={"page"="\d+"})
     */
    public function drawCardNumber(int $number = 1): Response
    {
        $title = "Draw " . $number;

        return $this->render('card.html.twig', [
            'title' => $title,
        ]);
    }

    /**
     * @Route("/card/deck/deal/{players}/{cards}", name="deal_players")
     */
    public function dealPlayers(int $players = 1, int $cards = 1): Response
    {
        $title = "Deal " . $players ." players ". $cards . " cards";

        return $this->render('card.html.twig', [
            'title' => $title,
        ]);
    }

    /**
     * @Route("/card/deck2", name="deck2")
     */
    public function deck2(): Response
    {
        $title = "Deck2";

        return $this->render('card.html.twig', [
            'title' => $title,
        ]);
    }
}
