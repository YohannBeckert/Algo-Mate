<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\AvailabilityRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(AvailabilityRepository $ar): Response
    {
        return $this->render('home/home.html.twig');
    }
}
