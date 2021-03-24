<?php

namespace App\Services;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class ResponseEmail {

    public function registerEmail($user): TemplatedEmail
    {
        $email = (new TemplatedEmail())

                ->from('algomate.info@gmail.com')
                ->to($user->getEmail())
                ->subject('Validation d\'inscription')
                ->text(
                '           Validation de votre inscription


                De: algomate.info@gmail.com
                A: '.$user->getEmail().'
                
                        Bonjour,
                
                        Votre inscription à bien été prise en compte sous les informations suivantes:
                        
                        - E-mail: '.$user->getEmail().',                
                        
                        Vous pouvez désormais vous connecter sur notre site à l\'adresse suivante: http://0.0.0.0:8000/login'
                );

        return $email;            
    }

}