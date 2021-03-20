<?php

namespace App\Form\Step;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

class StepTwoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username',null,[
                'label' => 'Pseudo in game *',
                'attr' => [
                    'placeholder' => 'Votre pseudo en jeu...'
                ],
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Vous devez entrer votre pseudo (in game).'
                    ]),
                ]
            ])
            ->add('countryInGame',ChoiceType::class,[
                'label' => 'Votre régions de jeu *',
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Vous devez indiquer quel est votre région de jeu.'
                    ]),
                ],
                'multiple' => false,
                'expanded' => true,
                'choices' => [
                    'EUW' => "EUW",
                    'EUNE' => "EUNE",
                    'NA' => "NA",
                    'RU' => "RU",
                    'TR' => "TR",
                    'BR' => "BR",
                    'KR' => "KR",
                    'OCE'=> "OCE",
                    'LAS' => "LAS"
                ]
            ])
            ->add('soloRank',ChoiceType::class,[
                'label' => 'Votre rank en solo',
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Vous devez indiquer quel est votre rank en solo.'
                    ]),
                ],
                'multiple' => false,
                'expanded' => false,
                'choices' => [
                    'Unranked' => "Unranked",
                    'Iron' => "Iron",
                    'Bronze' => "Bronze",
                    'Silver' => "Silver",
                    'Gold' => "Gold",
                    'Platinium' => "Platinium",
                    'Diamond' => "Diamond",
                    'Master'=> "Master",
                    'Grand Master' => "Grand Master",
                    'Challenger' => "Challenger"
                ]
            ])
            ->add('soloDivision',ChoiceType::class,[
                'label' => 'Votre division',
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Vous devez indiquer quel est votre division en ranked solo.'
                    ]),
                ],
                'multiple' => false,
                'expanded' => false,
                'choices' => [
                    'N/A' => "None",
                    'V' => "V",
                    'IV' => "IV",
                    'III' => "III",
                    'II' => "II",
                    'I' => "I",
                ]
            ])
            ->add('flexRank',ChoiceType::class,[
                'label' => 'Votre rank en flex',
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Vous devez indiquer quel est votre rank en flex.'
                    ]),
                ],
                'multiple' => false,
                'expanded' => false,
                'choices' => [
                    'Unranked' => "Unranked",
                    'Iron' => "Iron",
                    'Bronze' => "Bronze",
                    'Silver' => "Silver",
                    'Gold' => "Gold",
                    'Platinium' => "Platinium",
                    'Diamond' => "Diamond",
                    'Master'=> "Master",
                    'Grand Master' => "Grand Master",
                    'Challenger' => "Challenger"
                ]
            ])
            ->add('flexDivision',ChoiceType::class,[
                'label' => 'Votre division',
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Vous devez indiquer quel est votre division en ranked flex.'
                    ]),
                ],
                'multiple' => false,
                'expanded' => false,
                'choices' => [
                    'N/A' => "None",
                    'V' => "V",
                    'IV' => "IV",
                    'III' => "III",
                    'II' => "II",
                    'I' => "I",
                ]
            ])
            ->add('firstRole',ChoiceType::class,[
                'label' => 'Rôle principal',
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Vous devez indiquer quel est votre rôle.'
                    ]),
                ],
                'multiple' => false,
                'expanded' => false,
                'choices' => [
                    'Toplaner' => "Toplaner",
                    'Jungler' => "Jungler",
                    'Midlaner' => "Midlaner",
                    'ADC' => "ADC",
                    'Support' => "Support",
                ]
            ])
            ->add('secondRole',ChoiceType::class,[
                'label' => 'Rôle secondaire',
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Vous devez indiquer quel est votre second rôle.'
                    ]),
                ],
                'multiple' => false,
                'expanded' => false,
                'choices' => [
                    'Aucun' => "Aucun",
                    'Toplaner' => "Toplaner",
                    'Jungler' => "Jungler",
                    'Midlaner' => "Midlaner",
                    'ADC' => "ADC",
                    'Support' => "Support",
                ]
            ])
            ->add('goal', ChoiceType::class,[
                'label' => 'Pourquoi cherchez vous un mate?',
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Vous devez indiquer au moins 1 raison.'
                    ]),
                ],
                'multiple' => true,
                'expanded' => true,
                'choices' => [
                    'Rank up' => "Rank up",
                    'Lan' => "Lan",
                    'Consolider mon équipe' => "Consolider mon équipe",
                    'S\'amuser à 2' => "S'amuser à 2",
                    'Autre' => "Autre",
                ]
            ])
            /* ->add('favoriteChampion', EntityType::class, [
                'class'=> Champion::class,
                'choice_label'=> 'Champions',
                'constraints' => [new NotBlank(['message'=> 'Ce champs ne peut pas être vide'])]
            ]) */

            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
