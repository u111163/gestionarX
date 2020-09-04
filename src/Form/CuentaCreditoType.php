<?php

namespace App\Form;

use App\Entity\CuentaCredito;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CuentaCreditoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero')
            ->add('numero_cci')
            ->add('moneda')
            ->add('descripcion')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('empresa_id')
            ->add('banco_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CuentaCredito::class,
        ]);
    }
}
