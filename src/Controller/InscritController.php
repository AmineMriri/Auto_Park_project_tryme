<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\FormClientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscritController extends AbstractController

{
    /**
     * @Route("/inscrit", name="app_inscrit")
     */

    public function addClient (Request $request): Response
    {
        $ins = new Client();
        $form = $this->createForm(FormClientType::class, $ins);

        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ins);
            $em->flush();

            return $this->redirectToRoute('app_login');
        }
        return $this->render('inscrit.html.twig',
            [
                'formClient' => $form->createView()
            ]);
    }
}
