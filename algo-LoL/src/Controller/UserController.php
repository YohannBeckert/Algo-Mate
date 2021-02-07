<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/", name="login")
     */
    public function login(UserRepository $userRepository): Response
    {
        
        return $this->render('user/login.html.twig', [
            'login' => $userRepository->findAll(),
        ]);
    }
}
