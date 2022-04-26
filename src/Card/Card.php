<?php

namespace App\Card;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Card extends AbstractController
{
    private $value;

    public function __construct()
    {
        $this->value = 'Daniel';
    }

    public function getName(): string
    {
        return $this->value;
    }
}
