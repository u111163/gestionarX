<?php

namespace App\Form;

use App\Entity\PagoPersonal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PagoPersonalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('importe')
            ->add('descripcion')
            ->add('fecha')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('cuenta_credito_id')
            ->add('personal_pago_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PagoPersonal::class,
        ]);
    }
}
