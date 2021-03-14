<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('firstname')
            ->add('lastname')
            ->add('age')
            ->add('country')
            ->add('city')
            ->add('username')
            ->add('countryInGame')
            ->add('soloRank')
            ->add('flexRank')
            ->add('firstRole')
            ->add('secondRole')
            ->add('favoriteChampion')
            ->add('hatedChampion')
            ->add('goal')
            ->add('availability')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
