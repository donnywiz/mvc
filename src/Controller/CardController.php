<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class CardController extends AbstractController
{
    /**
     * @Route("/card/", name="card")
     */
    public function card(): Response
    {
        $title = "kmom02 / card game";

        return $this->render('deck/card.html.twig', [
            'title' => $title,
        ]);
    }

    /**
     * @Route("/card/deck", name="deck")
     */
    public function showDeck(SessionInterface $session): Response
    {
        $title = "Deck, unshuffled and sorted";

        # initialize objects
        $cardObject = new \App\Card\Card();
        $deckObject = new \App\Card\Deck();

        # inject object to class/method
        $deckObject->createDeck($cardObject);
        $session->set("deck", $deckObject);

        $deck = $deckObject->getDeck();

        $data = [
            'showDeck' => $deck,
        ];

        return $this->render('deck/deck.html.twig', [
            'title' => $title,
            'data' => $data,
        ]);
    }

    /**
     * @Route("/card/deck/shuffle", name="shuffle")
     */
    public function shuffleCards(SessionInterface $session): Response
    {
        $title = "Shuffle";

        $deck = $session->get('deck');
        $deck->shuffleDeck();
        $shuffledDeck = $deck->getDeck();


        $data = [
            'showDeck' => $shuffledDeck,
        ];

        return $this->render('deck/deck.html.twig', [
            'title' => $title,
            'data' => $data,
        ]);
    }

    /**
     * @Route("/card/deck/draw/{number}",
     * name="draw",
     * )
     */
    public function drawCard(SessionInterface $session, int $number = 1): Response
    {
        $title = "Draw";

        $deckObject = $session->get('deck');
        $deck = $deckObject->drawCard($number);


        $data = [
            'cards' => $deck,
        ];

        return $this->render('deck/draw_card.html.twig', [
            'title' => $title,
            'data' => $data,
        ]);
    }

    /**
     * @Route("/card/deck/deal/{players}/{cards}", name="deal_players")
     */
    public function dealPlayers(int $players = 1, int $cards = 1): Response
    {
        $title = "Deal " . $players ." players ". $cards . " cards";

        return $this->render('deck/card.html.twig', [
            'title' => $title,
        ]);
    }

    /**
     * @Route("/card/deck2", name="deck2")
     */
    public function deck2(): Response
    {
        $title = "Deck2";

        return $this->render('deck/card.html.twig', [
            'title' => $title,
        ]);
    }

    /**
     * @Route("/card/api/deck", name="api_deck")
     */
    public function getDeck(): Response
    {
        $title = "Deck";

        # initialize objects
        $cardObject = new \App\Card\Card();
        $deckObject = new \App\Card\Deck();

        # inject object to class/method
        $deckObject->createDeck($cardObject);
        $data = $decObjectk->showDeck();

        return $this->json($data);
    }
}
