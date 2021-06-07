<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\AvailabilityRepository;
use App\Repository\SearchRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(UserRepository $ur, SearchRepository $sr): Response
    {
       /*  $actualUser = $this->getUser();
        $actualUserId = $actualUser->getId(); */
        
        /* tableau des objectifs de l'utilisateur actuel */
       /*  $actualGoalUser = $sr->findBy(['user' => $actualUserId]); */
        
        /* Mate ayant le même rank que l'utilisateur actuel */
        /* $preferMateRank = $actualGoalUser[0]->getSoloRank();
        $mateSameRank = $ur->compareSoloRank($actualUser->getId(), $preferMateRank); */
        /* dump($mateSameRank[0]); */
/*         foreach($mateSameRank as $value){
            /* foreach($value as $index => $result){
                $idSameRank = $result;
            } */
            /* $idSameRank[] = $value["id"];           
        }
        dump($idSameRank);  */

        /* Mate ayant le même rank et le même pays que l'utilisateur actuel */
      /*   $preferMateCountry = $actualGoalUser[0]->getCountry();
        if($preferMateCountry === "Pas d'importance"){
            $mateCountry = "'France' OR `country`='Belgique' OR `country` = 'Luxembourg' OR `country` = 'Suisse'";
        }
        else{
            $mateCountry = $preferMateCountry;
        } */
        /* $mateSameCountry = $ur->compareCountry($mateSameRank, $mateCountry); */



        return $this->render('home/home.html.twig'/* ,[
            'user' => $actualUser
        ] */);
    }
}
