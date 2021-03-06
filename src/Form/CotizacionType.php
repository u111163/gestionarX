<?php

namespace App\Form;

use App\Entity\Cotizacion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CotizacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha_emision')
            ->add('tiempo_validez')
            ->add('condicion')
            ->add('serie')
            ->add('numero')
            ->add('moneda')
            ->add('aplica_igv')
            ->add('sub_total')
            ->add('descuentos')
            ->add('base_imponible')
            ->add('igv')
            ->add('total')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('punto_venta_id')
            ->add('cliente_id')
            ->add('empresa_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cotizacion::class,
        ]);
    }
}
