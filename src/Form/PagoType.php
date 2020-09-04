<?php

namespace App\Form;

use App\Entity\Pago;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PagoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha')
            ->add('tipo')
            ->add('monto')
            ->add('descripcion')
            ->add('nro_transaccion')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('comprobante_id')
            ->add('cuenta_credito_id')
            ->add('forma_pago_id')
            ->add('empresa_id')
            ->add('caja_chica_id')
            ->add('usuario_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pago::class,
        ]);
    }
}
