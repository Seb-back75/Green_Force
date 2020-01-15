<?php

namespace App\Form;

use App\Entity\Bureau;
use App\Entity\Categorie;
use App\Entity\Modele;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BureauType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder  
            ->add('image')
            ->add('intitule')
            ->add('description')
            ->add('modele',EntityType::class,[
                'class' => Modele::class,
                'choice_label' => 'libelle'
    
                ])
             ->add('prix')
          
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bureau::class,
        ]);
    }
}
