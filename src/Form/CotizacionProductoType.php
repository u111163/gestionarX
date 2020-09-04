<?php

namespace App\Form;

use App\Entity\CotizacionProducto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CotizacionProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad')
            ->add('descripcion')
            ->add('precio_unitario')
            ->add('precio_venta')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('cotizacion_id')
            ->add('producto_id')
            ->add('empresa_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CotizacionProducto::class,
        ]);
    }
}
