<?php

namespace App\Form\Step;

use App\Entity\Search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class StepSixType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('country', ChoiceType::class, [
                'label' => 'Pays (IRL)',
                'attr' => [
                    'placeholder' => 'Votre pays...'
                ],
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Ce champs ne peut pas être vide.'
                    ]),
                    ],
                'multiple' => false,
                'expanded' => false,
                'choices' => [
                    'Pas d\'importance' => "Pas d'importance",
                    'France' => "France",
                    'Belgique' => "Belgique",
                    'Suisse' => "Suisse",
                    'Luxembourg' => "Luxembourg",
                ]
            ])
            ->add('countryInGame',ChoiceType::class,[
                'label' => 'Régions de jeu (IG)',
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Ce champ ne peut pas être vide.'
                    ]),
                ],
                'multiple' => false,
                'expanded' => false,
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
                'label' => 'Son rank en solo',
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Vous devez indiquer un rank en solo.'
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
            ->add('flexRank',ChoiceType::class,[
                'label' => 'Son rank en flex',
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Vous devez indiquer un rank en flex.'
                    ]),
                ],
                'multiple' => false,
                'expanded' => false,
                'choices' => [
                    'Pas d\'importance' => "Pas d'importance",
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
            ->add('firstRole',ChoiceType::class,[
                'label' => 'Son rôle principal',
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Vous devez indiquer un rôle.'
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
                'label' => 'Son rôle secondaire',
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Vous devez indiquer un second rôle.'
                    ]),
                ],
                'multiple' => false,
                'expanded' => false,
                'choices' => [
                    'Pas d\'importance' => "Pas d'importance",
                    'Toplaner' => "Toplaner",
                    'Jungler' => "Jungler",
                    'Midlaner' => "Midlaner",
                    'ADC' => "ADC",
                    'Support' => "Support",
                ]
            ])
            ->add('goal', ChoiceType::class,[
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Vous devez indiquer 1 raison.'
                    ]),
                ],
                'multiple' => false,
                'expanded' => true,
                'choices' => [
                    'Rank up' => "Rank up",
                    'Lan' => "Lan",
                    'Consolider une équipe' => "Consolider une équipe",
                    'Entrer dans une équipe' => "Entrer dans une équipe",
                    'S\'amuser à 2' => "S'amuser à 2",
                    'Autre' => "Autre",
                ]
            ])
            ->add('age', ChoiceType::class,[
                'constraints' => [
                    new NotBlank([
                        'message'=> 'Vous devez indiquer 1 tranche d\'âge.'
                    ]),
                ],
                'multiple' => false,
                'expanded' => true,
                'choices' => [
                    'Pas d\'importance' => "Pas d'importance",
                    'Moins de 18 ans' => "Moins de 18 ans",
                    'Plus de 18 ans' => "Plus de 18 ans",
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
        ]);
    }
}
