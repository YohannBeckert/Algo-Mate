<?php

namespace App\Form\Step;

use App\Entity\Availability;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class StepFiveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('monday',null,[
                'label' => 'Lundi',
                'attr' => [
                    'placeholder' => 'Ex : 08h00/12h00'
                ]
            ])
            ->add('tuesday',null,[
                'label'=> 'Mardi',
                'attr' => [
                    'placeholder' => 'Ex : 16h00/19h30 - 20h00/22h30'
                ]
            ])
            ->add('wednesday',null,[
                'label'=> 'Mercredi',
                'attr' => [
                    'placeholder' => 'Ex : 18h00/23h00'
                ]
            ])
            ->add('thursday',null,[
                'label'=> 'Jeudi',
                'attr' => [
                    'placeholder' => 'Ex : Pas disponible'
                ]
            ])
            ->add('friday',null,[
                'label'=> 'Vendredi',
                'attr' => [
                    'placeholder' => 'Ex : 12h00/14h00 - 18h30/00h00'
                ]
            ])
            ->add('saturday',null,[
                'label'=> 'Samedi',
                'attr' => [
                    'placeholder' => 'Ex : Toute la journée'
                ]
            ])
            ->add('sunday',null,[
                'label'=> 'Dimanche',
                'attr' => [
                    'placeholder' => 'Ex : 10h00/12h00 - 15h00/18h00 - 20h00/23h00'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Availability::class,
        ]);
    }
}
