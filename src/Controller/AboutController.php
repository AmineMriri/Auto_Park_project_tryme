<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{

//    public function index(): Response
//    {
//        return $this->render('index.html.twig');
//    }
    /**
     * @Route("/about", name="app_about")
     */
    public function about()
    {
        return $this->render("about.html.twig");
    }
}

