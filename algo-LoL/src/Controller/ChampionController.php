<?php

namespace App\Controller;

use App\Entity\Champion;
use App\Repository\ChampionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChampionController extends AbstractController
{
    /**
     * @Route("/", name="champion")
     */
    public function index(ChampionRepository $champRepo): Response
    {
        return $this->render('champion/browse.html.twig', [
            'champion' => $champRepo,
        ]);
    }
}
