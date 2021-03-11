<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FoundMateController extends AbstractController
{
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
