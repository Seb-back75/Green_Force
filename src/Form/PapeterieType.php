<?php

namespace App\Form;

use App\Entity\Type;
use App\Entity\Papeterie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PapeterieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('format')
            ->add('prix')
            ->add('image')
            ->add('type')
            ->add('type',EntityType::class,[
                'class' => Type::class,
                'choice_label' => 'utilisation'
    
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Papeterie::class,
        ]);
    }
}
