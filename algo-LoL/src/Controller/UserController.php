<?php

namespace App\Controller;

use App\Entity\Availability;
use App\Entity\User;
use App\Form\RegisterType;
use App\Form\UserType;
use App\Repository\AvailabilityRepository;
use App\Repository\SearchRepository;
use App\Repository\UserRepository;
use App\Services\CompareGoal;
use App\Services\ResponseEmail;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{

    /**
     * @Route("/profile", name="profile", methods={"GET"})
     */
    public function profile(AvailabilityRepository $ar, CompareGoal $cg, UserRepository $ur, SearchRepository $sr): Response
    {
        /* Récupération du user actuel et son ID */
        $user = $this->getUser();
        $userId = $user->getId();

        /* Récupération du service de comparaison */
        $resultCompareGoal = $cg->compareGoal($ur, $sr, $user);
        /* Stockage du résultat dans un tableau */
        $matchMateTable = $resultCompareGoal[0];
        /* Récupération du premier mate du tableau */
        $mateCompare = $matchMateTable[0];
        /* Récupération de l'ID du mate */
        $mateId = $mateCompare["id"];
        /* Appel de l'entité de la BDD */
        $mateDb = $ur->findBy(['id' => $mateId]);
        $mate = $mateDb[0];
        dump($mate);

        /* Récupération des disponibilités du user actuel */
        $availabilityUser = $ar->findBy(['user' => $userId]);
        /* Récupération des disponibilités du mate */
        $availabilityMateTable = $ar->findBy(['user' => $mateId]);
        $availabilityMate = $availabilityMateTable[0];
        dump($availabilityMate);

        /* Si profil non rempli */
        if(empty($user->getFirstname() || $user->getAge() || $user->getCountry())){

            $this->addFlash('warning-profile_empty', 'Pour accéder à votre profil, vous devez au minimum remplir votre prénom, votre âge et votre pays.');

            return $this->redirectToRoute('step_one');
        };

        /* Si profil rempli */
        return $this->render('user/profile.html.twig',[
            'user' => $user,
            'availabilityUser' => $availabilityUser,
            'mate' => $mate,
            'availabilityMate' => $availabilityMate
        ]);
    }
    /**
     * @Route("/profile/edit", name="edit_profile", methods={"GET","POST"})
     */
    public function edit(Request $request, AvailabilityRepository $ar): Response
    {
        $user = $this->getUser();
        $userId = $user->getId();
        $availabilityUser = $ar->findBy(['user' => $userId]);

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);       

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profile');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'availabilityUser' => $availabilityUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/register", name="register", methods={"GET", "POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder, EntityManagerInterface $em, MailerInterface $mailer, ResponseEmail $responseEmail): Response
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            $user = $form->getData();
            $email = $responseEmail->registerEmail($user);

            $mailer->send($email);
            // récupérer le mot de passe en clair
             $rawPassword = $user->getPassword(); 
            // l'encoder
            $encodedPassword = $encoder->encodePassword($user, $rawPassword);
           
            // le renseigner dans l'objet
            $user->setPassword($encodedPassword);

            $em->persist($user);
            $em->flush();

            $this->addFlash('success-inscription', 'Vous êtes enregistré. Vous pouvez désormais vous connecter.');

            return $this->redirectToRoute('app_login');
        } 

        return $this->render('security/register.html.twig',[
            'form' => $form->createView(),
        ]);
    }

     /**
     * @Route("/user/list", name="user_list", methods="GET")
     */
    public function list(UserRepository $ur): Response
    {
        $allUsersDb = $ur->findAll();

        foreach ($allUsersDb as $user){
            if($user->getUsername() == NULL){

            }
            else{
                $allUsers[] = $user;
            }
        };

        return $this->render('user/list.html.twig',[
            'allUsers' => $allUsers,
        ]);
    }

    /**
     * @Route("/user/profile/{id}", name="user_page",requirements={"id": "\d+"}, methods="GET")
     */
    public function show(User $user, AvailabilityRepository $ar): Response
    {
        if($this->getUser()){
            $userId = $user->getId();           
            $availabilityUser = $ar->findBy(['user' => $userId]);     
            return $this->render('user/show.html.twig',[
                'user' => $user,
                'availabilityUser' => $availabilityUser
            ]);
        }
        else{
            $this->addFlash('warning-check-profile', 'Vous devez êtes connecté pour pouvoir accéder aux profiles des joueurs.');
            return $this->redirectToRoute('user_list');
        };
        
    }

}
