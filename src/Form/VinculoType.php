<?php

namespace App\Form;

use App\Entity\Vinculo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VinculoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion')
            ->add('fecha')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('comprobante_principal_id')
            ->add('comprobante_secundario_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vinculo::class,
        ]);
    }
}
