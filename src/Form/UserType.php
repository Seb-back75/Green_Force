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
            ->add('entreprise')
            ->add('responsable')
            ->add('email')
            ->add('telephone')
            ->add('mdp')
            ->add('confirm_mdp')
            ->add('adresseL')
            ->add('villeL')
            ->add('CpL')
            ->add('adresseF')
            ->add('villeF')
            ->add('CpF')
            ->add('NTVA')
            ->add('NSIRET')
            ->add('NKBIS')
        ;
    }

    public function getParent()
    {
        return 'FOSUserBundle';
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
