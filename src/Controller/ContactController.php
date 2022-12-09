<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactUsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact")
     */

    public function addContact(Request $request): Response
    {
        $con = new Contact();
        $form = $this->createForm(ContactUsType::class, $con);

        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($con);
            $em->flush();

            return $this->redirectToRoute('app_contact');
        }
        return $this->render('contact.html.twig',
            [
                'formContact' => $form->createView()
            ]);
    }
}
