<?php

namespace App\Form;

use App\Entity\CartaFianza;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CartaFianzaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('status')
            ->add('detalle')
            ->add('importe')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('proyecto_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CartaFianza::class,
        ]);
    }
}
