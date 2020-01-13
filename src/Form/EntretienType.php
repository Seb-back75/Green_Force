<?php

namespace App\Form;

use App\Entity\ProdEntret;
use Proxies\__CG__\App\Entity\ModeleProd;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntretienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('format')
            ->add('prix')
            ->add('image')
            ->add('modeleProd',EntityType::class,[
                'class' => ModeleProd::class,
                'choice_label' => 'utilisation'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProdEntret::class,
        ]);
    }
}
