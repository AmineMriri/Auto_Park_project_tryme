<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\AddReservType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="app_index")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/addReserv", name="app_reserv")
     */
    public function addReserv(Request $request): Response
    {
        $res = new Reservation();
        $form = $this->createForm(AddReservType::class, $res);

        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($res);
            $em->flush();

            return $this->redirectToRoute('app_reserv');
        }
        return $this->render('/index.html.twig',
            [
                'formReserv' => $form->createView()
            ]);
    }
}

