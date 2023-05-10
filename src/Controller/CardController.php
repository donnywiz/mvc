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
        $session->set("cardObject", $cardObject);

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
        $title = "Deck, shuffled";

        $card = $session->get('cardObject');
        $deck = $session->get('deck');

        $deck->shuffleDeck($card);
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
        $title = "Draw card from deck";

        $deckObject = $session->get('deck');
        $deck = $deckObject->drawCard($number);
        $deckCount = $deckObject->deckCount();

        $data = [
            'cards' => $deck,
            'numberOfCards' => $deckCount,
        ];

        return $this->render('deck/draw_card.html.twig', [
            'title' => $title,
            'data' => $data,
        ]);
    }

    /**
     * @Route("/card/deck2", name="deck2", methods={"GET", "HEAD"})
     */
    public function deck2(SessionInterface $session): Response
    {
        $title = "Deck with 2 harlequins, unshuffled and sorted";

        # initialize objects
        $cardObject = $session->get('cardObject');
        $deck2Object = new \App\Card\Deck2($cardObject);

        $deck = $deck2Object->getDeck();

        $data = [
            'showDeck' => $deck,
        ];

        return $this->render('deck/deck2.html.twig', [
            'title' => $title,
            'data' => $data,
        ]);
    }

    /**
     * @Route("/card/api/deck", name="api-deck")
     */
    public function renderJson(): Response
    {
        $title = "Deck";

        # initialize objects
        $cardObject = new \App\Card\Card();
        $deckObject = new \App\Card\Deck();

        # inject object to class/method
        $deckObject->createDeck($cardObject);
        $data = $deckObject->getDeck();

        return $this->json($data);
    }
}
