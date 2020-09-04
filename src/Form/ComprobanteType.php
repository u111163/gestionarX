<?php

namespace App\Form;

use App\Entity\Comprobante;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComprobanteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha_emision')
            ->add('vencimiento')
            ->add('fecha_vencimiento')
            ->add('fecha_registro')
            ->add('tipo_nota_credito')
            ->add('tipo_nota_debito')
            ->add('serie')
            ->add('correlativo')
            ->add('concepto')
            ->add('moneda')
            ->add('importe')
            ->add('base')
            ->add('aplica_igv')
            ->add('igv')
            ->add('total')
            ->add('servicio')
            ->add('servicios')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('cliente_id')
            ->add('tipo_cambio_id')
            ->add('tipo_comprobante_id')
            ->add('empresa_id')
            ->add('usuario_id')
            ->add('registro_id')
            ->add('proyecto_id')
            ->add('prestacion_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comprobante::class,
        ]);
    }
}
