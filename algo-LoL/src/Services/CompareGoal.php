<?php

namespace App\Services;


class CompareGoal {

    public function compareGoal ($ur, $sr, $actualUser){

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
        $auGoal = $actualGoalUser->getGoal();
        $auAge = $actualGoalUser->getAge();
        

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

        /* Récupération de tous les utilisateurs qui ont le first role OU le second role
        correspondant à ce que le user recherche. Basé sur le tableau précédent */            
        foreach ($matchFlexRank as $firstRole){
            $mateFirstRole = $firstRole["first_role"];
            if($mateFirstRole == $auFirstRole || $mateFirstRole == $auSecondRole){
                $matchMateRole[] = $firstRole;
            }
            else{

            }
        }
        if($auSecondRole == "Pas d'importance"){

        }
        else{
            foreach ($matchFlexRank as $secondRole) {
                $mateSecondRole = $secondRole["second_role"];
                if ($mateSecondRole == $auFirstRole || $mateSecondRole == $auSecondRole) {
                    $matchMateRole[] = $secondRole;
                }
                else {

                }
            }
        }

        /* Récupération de tous les utilisateurs qui ont le même objectif que le user. Basé sur le tableau précédent */
        foreach ($matchMateRole as $matchGoal) {
            $mateMatchGoal = $matchGoal["goal"];
            if ($mateMatchGoal == $auGoal) {
                $matchMateGoal[] = $matchGoal;
            }
        }

        /* Récupération de tous les utilisateurs qui ont l'âge que le user recherche'. Basé sur le tableau précédent */
        if ($auAge == "Pas d'importance"){
            $matchMate[] = $matchMateGoal;
        }
        else{
            foreach ($matchMateGoal as $goal) {
                $mateMatchAge = $goal["goal"];
                if ($mateMatchAge == $auAge) {
                    $matchMate[] = $goal;
                }
            }
        }

        /* $matchMate[] contient les utilisateurs correspondant parfaitement au user */

        return $matchMate;
    }
    }

}