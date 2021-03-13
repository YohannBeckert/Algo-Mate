<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{

/*     public function login(Request $request, UserPasswordEncoderInterface $encoder, UserInterface $userInterface): Response
    {   
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Encodage du mot de passe
            $user->setPassword($encoder->encodePassword($user, $user->getPassword()));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Vous êtes enregistré. Vous pouvez maintenant vous connecter.');

            return $this->redirectToRoute('login');
        }
        return $this->render('login/login.html.twig',[
            'form' => $form->createView(),
        ]);
    } */

    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder, UserInterface $userInterface): Response
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Encodage du mot de passe
            $user->setPassword($encoder->encodePassword($userInterface, $user->getPassword()));
            // Assignartion du rôle par défaut VIA le nom du rôle et non l'ID
            /* $role = $roleRepository->findOneByRoleString('ROLE_USER');
            $user->setRole($role); */

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Vous êtes enregistré. Vous pouvez maintenant vous connecter.');

            return $this->redirectToRoute('login');
        }

        return $this->render('login/login.html.twig',[
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/found", name="found_mate")
     */
    public function rules(): Response
    {
        return $this->render('found_mate/rules.html.twig');
    }

    /**
     * @Route("/found/step_1", name="step_one")
     */
    public function stepOne(): Response
    {
        return $this->render('found_mate/step_one.html.twig');
    }
}
