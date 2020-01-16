<?php

namespace App\Form;

use App\Entity\Papeterie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PapeterieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Libelle')
            ->add('Description')
            ->add('imageFile', VichImageType::class, array(
                'required' => true,
                'allow_delete' => true,
                'download_uri' => true,
                'image_uri' => true,
                'label' => 'Image *'
            ))
            ->add('Pa')
            ->add('Pv')
            ->add('TVA')
            ->add('Stock')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Papeterie::class,
        ]);
    }
}
