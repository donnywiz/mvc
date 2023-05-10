<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SessionController extends AbstractController
{
    /**
     * @Route("/session",
     * name="get-session",
     * methods={"GET", "HEAD"})
     */
    public function session(Request $request): Response
    {
        $title = "Session Example";

        $data = [
            'user' => $request->query->get('user'),
            'email' => $request->query->get('email'),
            'pwd' => $request->query->get('pwd')
        ];

        return $this->render('session/session.html.twig', [
            'title' => $title,
            'data' => $data,
        ]);
    }

    /**
     * @Route("/session/post",
     * name="post-session",
     * methods={"GET", "HEAD"})
     */
    public function loginSession(): Response
    {
        $title = "Login";

        return $this->render('session/session_form.html.twig', [
            'title' => $title,
        ]);
    }

    /**
     * @Route("/session/post",
     * name="post-session-process",
     * methods={"POST"})
     */
    public function postSession(Request $request, SessionInterface $session): Response
    {
        $this->addFlash('notice', "Hello World!");
        return $this->redirectToRoute('post-session');
    }
}
