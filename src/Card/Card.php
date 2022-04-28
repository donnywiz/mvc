<?php

namespace App\Card;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class Card
{

    private $suit;
    private $rank;
    private $value;

     /**
      * Constructor method to assign values when initiating object.
      *
      * @param string suit,  string rank int value
      * @return void
      */
    public function __construct($suits = '0', $rank = '0', $value = 0)
    {
        $this->suits = $suits;
        $this->rank = $rank;
        $this->value = $value;

    }
}
