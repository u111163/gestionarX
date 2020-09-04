<?php

namespace App\Form;

use App\Entity\Producto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bien')
            ->add('cantidad')
            ->add('moneda')
            ->add('costo')
            ->add('precio_min')
            ->add('precio_venta')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('categoria_id')
            ->add('unidad_medida_id')
            ->add('empresa_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Producto::class,
        ]);
    }
}
