<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\AddReservType;
use App\Entity\Contact;
use App\Form\ContactUsType;
use App\Entity\Subscription;
use App\Form\SubscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
//    public function index()
//    {
//        return $this->render('index.html.twig');
//    }
//
//    /**
//     * @Route("/addReserv", name="app_reserv")
//     */
    public function addReserv(Request $request): Response
    {
        $res = new Reservation();
        $form = $this->createForm(AddReservType::class, $res);

        $con = new Contact();
        $formm = $this->createForm(ContactUsType::class,$con);

        $subscription = new Subscription();
        $formmm = $this->createForm(SubscriptionType::class,$subscription);

        $formm->handleRequest($request);

        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($res);
            $em->flush();

            return $this->redirectToRoute('app_index');
        }

        if ($formm->isSubmitted() and $formm->isValid()){
            $emm = $this->getDoctrine()->getManager();
            $emm ->persist($con);
            $emm ->flush();
            return $this->redirectToRoute('app_index');
        }
        if ($formmm->isSubmitted() and $formmm->isValid()){
            $emmm = $this->getDoctrine()->getManager();
            $emmm ->persist($subscription);
            $emmm ->flush();
            return $this->redirectToRoute('app_index');
        }

        return $this->render('/index.html.twig',
            [
                'formReserv' => $form->createView()
                ,'formContact' => $formm ->createView()
                ,'formSubscription' => $formmm ->createView()
            ]);
    }
}


