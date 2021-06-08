<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\AvailabilityRepository;
use App\Repository\SearchRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function PHPSTORM_META\map;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(UserRepository $ur, SearchRepository $sr): Response
    {
        /* Récupération de l'utilisateur */
        $actualUser = $this->getUser();

        if ($actualUser != NULL){
            /* Récupération de l'id de l'utilisateur */
            $actualUserId = $actualUser->getId();
            
            /* Tableau des objectifs de l'utilisateur actuel */
            $actualGoalUserBord = $sr->findBy(['user' => $actualUserId]);
            $actualGoalUser = $actualGoalUserBord[0];

            /* au = actual user */
            $auCountry = $actualGoalUser->getCountry();           
            $auCountryInGame = $actualGoalUser->getCountryInGame();
            $auSoloRank = $actualGoalUser->getSoloRank();
            $auFlexRank = $actualGoalUser->getFlexRank();
            $auFirstRole = $actualGoalUser->getFirstRole();
            $auSecondRole = $actualGoalUser->getSecondRole();
            $autableGoal = $actualGoalUser->getGoal();
            

            $mateSameGoal = $sr->findSameGoalMate($actualUserId,$auCountry,$auCountryInGame,$auSoloRank,$auFlexRank,$auFirstRole,$auSecondRole);
            

            /* Tableau de tous les utilisateurs sauf le user actuel*/
            $allUserExceptThis = $ur->findAllExceptThis($actualUserId);
           
            /* Tableau de tous les objectifs de chaque utilisateur sauf le user actuel*/
            $allUserGoalExceptThis = $sr->findAllExceptThis($actualUserId);
            /* dump($allUserGoalExceptThis); */


            /* Récupération de tous les utilisateurs qui ont le pays que le user recherche */
            if($auCountry == "Pas d'importance"){
                $mateCountry = $allUserExceptThis;
            }
            else{
                $mateCountry = $sr->findGoalCountry($actualUserId, $auCountry);
            }
            /* dump($mateCountry); */

            /* Récupération de tous les utilisateurs qui ont la région IG que le user recherche. Basé sur le tableau précédent */
            foreach ($mateCountry as $mate){
                $mateCIG = $mate["country_in_game"];
                if ($mateCIG == $auCountryInGame){
                    $matchMateCIG[] = $mate;
                }
                else{

                }               
            }
            
            /* Récupération de tous les utilisateurs qui ont le solo rank que le user recherche. Basé sur le tableau précédent */
            foreach ($matchMateCIG as $soloRank){
                $mateSoloRank = $soloRank["solo_rank"];
                if($mateSoloRank == $auSoloRank){
                    $matchMateSoloRank[] = $soloRank;
                }
                else{

                }
            }         

            /* Récupération de tous les utilisateurs qui ont le flex rank que le user recherche. Basé sur le tableau précédent */
            if($auFlexRank == "Pas d'importance"){
                $matchMateFlexRank[] = $matchMateSoloRank;
            }
            else{
                foreach ($matchMateSoloRank as $flexRank) {
                    $mateFlexRank = $flexRank["flex_rank"];
                     if($mateFlexRank == $auFlexRank){
                         $matchMateFlexRank[] = $flexRank;
                     }
                     else{

                     }
                }
            }
            $matchFlexRank = $matchMateFlexRank[0];

            /* Récupération de tous les utilisateurs qui ont le first role que le user recherche. Basé sur le tableau précédent */
            foreach ($matchFlexRank as $firstRole){
                $mateFirstRole = $firstRole["first_role"];
                if($mateFirstRole == $auFirstRole){
                    $matchMateFirstRole[] = $firstRole;
                }
                else{

                }
            }  
            dump($matchMateFirstRole);

            /* COMPARER LE SECOND ROLE, SI PAS D'IMPORTANCE => TOUT RECUPERER,
            SI UN CHOIX SELECTIONNE => PARTIR DU TABLEAU  MATCHFLEXRANK ?? */










        }
        

        return $this->render('home/home.html.twig'/* ,[
            'user' => $actualUser
        ] */);
    }
}
