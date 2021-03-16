<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{

    /**
     * @Route("/profile", name="profile", methods={"GET"})
     */
    public function profile(): Response
    {
        $user = $this->getUser();
        return $this->render('user/profile.html.twig',[
            'user' => $user
        ]);
    }

    /**
     * @Route("/register", name="register", methods={"GET", "POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder, EntityManagerInterface $em): Response
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) { 
            $user = $form->getData();
            // récupérer le mot de passe en clair
             $rawPassword = $user->getPassword(); 
            // l'encoder
            $encodedPassword = $encoder->encodePassword($user, $rawPassword);
           
            // le renseigner dans l'objet
            $user->setPassword($encodedPassword);

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Vous êtes enregistré. Vous pouvez maintenant vous connecter.');

            return $this->redirectToRoute('app_login');
        } 

        return $this->render('security/register.html.twig',[
            'form' => $form->createView(),
        ]);
    }

}
