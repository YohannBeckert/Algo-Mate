<?php

namespace App\Controller;

use App\Entity\Availability;
use App\Entity\User;
use App\Form\RegisterType;
use App\Repository\AvailabilityRepository;
use App\Repository\UserRepository;
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
    public function profile(AvailabilityRepository $ar): Response
    {
        $user = $this->getUser();
        $userId = $user->getId();
        
        $availabilityUser = $ar->findBy(['user' => $userId]);  
        if(empty($user->getFirstname() || $user->getAge() || $user->getCountry())){

            $this->addFlash('warning', 'Vous devez au minimum remplir votre Prénom, âge et Pays pour accéder à votre profil.');

            return $this->redirectToRoute('step_one');
        };

        return $this->render('user/profile.html.twig',[
            'user' => $user,
            'availabilityUser' => $availabilityUser
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


        function test(){

        };

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

            $this->addFlash('success', 'Vous êtes enregistré. Vous pouvez désormais vous connecter.');

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
     * @Route("/user/{id}", name="user_page",requirements={"id": "\d+"}, methods="GET")
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig',[
            'user' => $user,
        ]);
    }

}
