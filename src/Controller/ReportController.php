<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        $title = "Hem";

        return $this->render('home.html.twig', [
            'title' => $title,
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {
        $title = "Om";

        return $this->render('about.html.twig', [
            'title' => $title,
        ]);
    }

    /**
     * @Route("/report", name="report")
     */
    public function report(): Response
    {
        $title = "Redovisning";

        return $this->render('report.html.twig', [
            'title' => $title,
        ]);
    }

    /**
     * @Route("/report/kmom01", name="kmom01")
     */
    public function kmom(): Response
    {
        $title = "kmom01";

        return $this->render('report.html.twig', [
            'title' => $title,
        ]);
    }
}
