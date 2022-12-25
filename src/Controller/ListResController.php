<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ListResController extends AbstractController
{
//    #[Route('/list/res', name: 'app_list_res')]
//    public function index(): Response
//    {
//        return $this->render('list_res/index.html.twig', [
//            'controller_name' => 'ListResController',
//        ]);
//    }

/**
 * @Route ("/res",name="app_res")
 */
    public function ListRes(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $reservation = $em->getRepository("App:Reservation")->findAll();
        return $this->render('listeRes.html.twig',[
            "reservation"=>$reservation
        ]);
    }
    /**
     * @Route ("/deleteRes/{id}",name="app_resDel")
     */
    public function deleteRes($id):Response
    {
        $em = $this->getDoctrine()->getManager();
        $res = $em->getRepository("App:Reservation")->find($id);

        if ($res !==null){
            $em->remove($res);
            $em->flush();
        }else{
            throw new NotFoundHttpException("la reservation du ".$id."n'existe pas");
        }
        return $this->redirectToRoute('app_res');
    }

}
