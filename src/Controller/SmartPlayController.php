<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SmartPlayController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('SMART PLAY HOMEPAGE');
    }

    /**
     * @Route("/pages/{slug}")
     */
    public function Partners($slug)
    {
      return new Response(sprintf(
          'Futre page to show %s',
          $slug
      ));
    }
}