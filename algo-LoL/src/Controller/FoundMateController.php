<?php

namespace App\Controller;

use App\Entity\Champion;
use App\Entity\User;
use App\Form\Step\StepOneType;
use App\Form\Step\StepTwoType;
use App\Form\UserType;
use App\Repository\ChampionRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FoundMateController extends AbstractController
{
    /**
     * @Route("/found", name="found_mate", requirements={"id"="\d+"}, methods="GET")
     */
    public function rules(): Response
    {
        return $this->render('found_mate/rules.html.twig',[
            /* 'user' => $user */
        ]);
    }

    /**
     * @Route("/found/step_1", name="step_one", methods={"GET","POST"})
     */
    public function stepOne(Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(StepOneType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('step_two');
        }

        return $this->render('found_mate/step_one.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/found/step_2", name="step_two", methods={"GET","POST"})
     */
    public function stepTwo(Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(StepTwoType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('found_mate/step_two.html.twig',[
            'form' => $form->createView(),
        ]);
    }
}
