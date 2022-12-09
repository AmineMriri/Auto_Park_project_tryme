<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FeatureController extends AbstractController
{
    /**
     * @Route("/feature", name="app_feature")
     */
    public function feature()
    {
        return $this->render('feature.html.twig');
    }
}
