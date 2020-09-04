<?php

namespace App\Form;

use App\Entity\Prestacion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrestacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('monto')
            ->add('detalles')
            ->add('es_retenciones')
            ->add('retenciones')
            ->add('es_detraccion')
            ->add('detraccion')
            ->add('nro_pagos')
            ->add('periodicidad')
            ->add('created_at')
            ->add('updated_at')
            ->add('estado')
            ->add('proyecto_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Prestacion::class,
        ]);
    }
}
