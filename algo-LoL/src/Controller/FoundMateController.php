<?php

namespace App\Controller;

use App\Entity\Availability;
use App\Entity\Champion;
use App\Entity\Search;
use App\Entity\User;
use App\Form\Step\StepFiveType;
use App\Form\Step\StepFourType;
use App\Form\Step\StepOneType;
use App\Form\Step\StepSixType;
use App\Form\Step\StepTwoType;
use App\Form\Step\StepThreeType;
use App\Form\UserType;
use App\Repository\AvailabilityRepository;
use App\Repository\ChampionRepository;
use App\Repository\SearchRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class FoundMateController extends AbstractController
{
    /**
     * @Route("/found", name="found_mate", methods="GET")
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
            'form' => $form->createView(),
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

            return $this->redirectToRoute('step_four');
        }

        return $this->render('found_mate/step_three.html.twig',[
            'form' => $form->createView(),
            'allChamp' => $allChamp
        ]);
    }

    /**
     * @Route("/found/step_4", name="step_four", methods={"GET","POST"})
     */
    public function stepFour(Request $request, EntityManagerInterface $em, ChampionRepository $cr): Response
    {
        $allChamp = $cr->findAll();
        $user = $this->getUser();
        $form = $this->createForm(StepFourType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('step_five');
        }

        return $this->render('found_mate/step_four.html.twig',[
            'form' => $form->createView(),
            'allChamp' => $allChamp
        ]);
    }

     /**
     * @Route("/found/step_5", name="step_five", methods={"GET","POST","PUT"})
     */
    public function stepFive(Request $request, EntityManagerInterface $em): Response
    {

        $availability = new Availability();
        $form = $this->createForm(StepFiveType::class, $availability);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $availability = $form->getData();

            if(empty($availability->getMonday())){
                $availability->setMonday('Pas Disponible');
            }
            if(empty($availability->getTuesday())){
                $availability->setTuesday('Pas Disponible');
            }
            if(empty($availability->getWednesday())){
                $availability->setWednesday('Pas Disponible');
            }
            if(empty($availability->getThursday())){
                $availability->setThursday('Pas Disponible');
            }
            if(empty($availability->getFriday())){
                $availability->setFriday('Pas Disponible');
            }
            if(empty($availability->getSaturday())){
                $availability->setSaturday('Pas Disponible');
            }
            if(empty($availability->getSunday())){
                $availability->setSunday('Pas Disponible');
            }
            
            $availability->setUser($this->getUser());
            $em->persist($availability);
            $em->flush();

            return $this->redirectToRoute('step_six');
        }

        return $this->render('found_mate/step_five.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/found/step_6", name="step_six", methods={"GET","POST"})
     */
    public function stepSix(Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $search = new Search();
        $form = $this->createForm(StepSixType::class, $search);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $search->setUser($user);
            $em->persist($search);
            $em->flush();

            return $this->redirectToRoute('summary');
        }

        return $this->render('found_mate/step_six.html.twig',[
            'form' => $form->createView(),
            'user' => $user
        ]);
    }
    /**
     * @Route("/found/summary", name="summary", methods="GET")
     */
    public function summary(AvailabilityRepository $ar,SearchRepository $sr): Response
    {
        $user = $this->getUser();
        $userId = $user->getId();


        $availabilityUser = $ar->findBy(['user' => $userId]);        
        $searchUser = $sr->findBy(['user' => $userId]);

        $this->addFlash('success-found', 'Vos informations ont bien été enrgistré. Vous pouvez dès à présent voir vos Mate sur votre profil');

        return $this->render('found_mate/summary.html.twig',[
            'user' => $user,
            'availability' => $availabilityUser,
            'search' => $searchUser
        ]);
    }
}
