<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
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
                'attr' => ['class' => 'test'],
                'constraints' => [
                    new Email(['message' => 'Veuillez entrer un e-mail valide']),
                    new NotBlank(['message' => 'Ce champs ne peut pas être vide'])
                ]
            ])
             /* ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => ['class' => 'test'],
                'constraints' =>[
                    new NotBlank(['message'=> 'Ce champs ne peut pas être vide']),
                    new Length([
                        'min' => '6',
                        'minMessage'=> "Le mot de passe doit contenir au moins 6 caractères",                   
                    ])
                ]
            ])  */
            ->add('password', RepeatedType::class,[
                'type' => PasswordType::class,
                'constraints' => new NotBlank(),
                'invalid_message' => 'Les mots de passe doivent être identique.',
                'first_options'  =>[
                    'label' => 'Mot de passe',
                    'attr' => ['class' => 'first-password']
                ],
                'second_options' => [
                    'label' => 'Répéter le mot de passe',
                    'attr' => ['class' => 'second-password'],
                    'mapped' => false, 
                ],
                
                ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'attr' => ['id' => 'register_form']
        ]);
    }
}
