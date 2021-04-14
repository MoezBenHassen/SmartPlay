<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SmartPlayController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('page/homepage.html.twig');
    }

    /**
     * @Route("/pages/{slug}", name="page_partners")
     */
    public function Partners($slug)
    {

        return $this->render('page/partners.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),

        ]);
    }
}