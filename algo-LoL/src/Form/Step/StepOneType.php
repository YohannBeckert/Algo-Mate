<?php

namespace App\Form\Step;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class StepOneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('lastname', null, [
            'label' => 'Nom',
            'attr' => [
                'placeholder' => 'Votre nom...'
            ]
        ])
            ->add('firstname', null, [
                'label' => 'Prénom *',
                'attr' => [
                    'placeholder' => 'Votre prénom...'
                ],
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Ce champs ne peut pas être vide.'
                    ]),
                ]
            ])
            ->add('age', IntegerType::class,[
                'label' => 'Âge *',
                'attr' => [
                    'placeholder' => 'Votre âge...',
                ],
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Ce champs ne peut pas être vide.'
                    ]),
                ]
            ])
            ->add('country', null, [
                'label' => 'Pays *',
                'attr' => [
                    'placeholder' => 'Votre pays...'
                ],
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Ce champs ne peut pas être vide.'
                    ]),
                ]
            ])
            ->add('city', null, [
                'label' => 'Ville',
                'attr' => [
                    'placeholder' => 'Votre ville...'
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
