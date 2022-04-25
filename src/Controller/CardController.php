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

        return $this->render('card.html.twig', [
            'title' => $title,
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
     * @Route("/card/deck/draw/{number}", name="drawNumber")
     */
    public function drawCardNumber(string $number): Response
    {
        $title = "Draw" . $number;

        return $this->render('card.html.twig', [
            'title' => $title,
        ]);
    }
}
