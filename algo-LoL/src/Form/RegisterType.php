<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'constraints' => [
                    new Email(['message' => 'Veuillez entrer un e-mail valide']),
                    new NotBlank(['message' => 'Ce champs ne peut pas être vide'])
                ]
            ])
            ->add('password', PasswordType::class, [
                'constraints' =>[
                    new NotBlank(['message'=> 'Ce champs ne peut pas être vide']),
                    new Length([
                        'min' => '8',
                        'minMessage'=> "Le mot de passe doit contenir au moins 8 caractères",                   
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
