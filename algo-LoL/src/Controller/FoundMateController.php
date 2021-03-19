<?php

namespace App\Controller;

use App\Entity\Champion;
use App\Entity\User;
use App\Form\Step\StepOneType;
use App\Form\Step\StepTwoType;
use App\Form\Step\StepThreeType;
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
        if($user = $this->getUser()){
        return $this->render('found_mate/rules.html.twig');
        }
        else{
            $this->addFlash('warning-found', 'Vous devez vous inscire pour accéder à "Trouver un mate".');
            return $this->redirectToRoute('homepage');
        }
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

            return $this->redirectToRoute('step_three');
        }

        return $this->render('found_mate/step_two.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/found/step_3", name="step_three", methods={"GET","POST"})
     */
    public function stepThree(Request $request, EntityManagerInterface $em, ChampionRepository $cr): Response
    {
        $allChamp = $cr->findAll();
        $user = $this->getUser();
        $form = $this->createForm(StepThreeType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('found_mate/step_three.html.twig',[
            'form' => $form->createView(),
            'allChamp' => $allChamp
        ]);
    }
}
