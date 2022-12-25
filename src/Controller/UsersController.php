<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
//    #[Route('/users', name: 'app_users')]
//    public function index(): Response
//    {
//        return $this->render('users/index.html.twig', [
//            'controller_name' => 'UsersController',
//        ]);
//    }
/**
 * @Route ("/users",name="app_users")
 */
public function listusers():Response
{
    $em = $this->getDoctrine()->getManager();
    $users = $em->getRepository("App\Entity\User")->findAll();
    return $this->render('listusers.html.twig',[
     "listusers"=>$users
    ]);
}

/**
 * @Route ("/delusers/{id}", name="app_deluser")
 */
public function deleteuser($id):Response
{
    $em = $this->getDoctrine()->getManager();
    $user=$em->getRepository("App\Entity\User")->find($id);

    if($user !== null ){
        $em ->remove($user);
        $em -> flush();
    }else{
        throw new NotFoundHttpException("user not found 404");
    }
    return $this->redirectToRoute("app_users");
}

}
