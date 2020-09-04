<?php

namespace App\Form;

use App\Entity\PersonalPago;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonalPagoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha')
            ->add('remuneracion')
            ->add('dependientes')
            ->add('dependientesv')
            ->add('gratificacion')
            ->add('gratificacionv')
            ->add('asig_especial')
            ->add('asig_especialv')
            ->add('otros')
            ->add('otrosv')
            ->add('aporte_obligario')
            ->add('aporte_obligatoriov')
            ->add('afp')
            ->add('afpv')
            ->add('comision_afp')
            ->add('comision_afpv')
            ->add('essalud_regular')
            ->add('essalud_regularv')
            ->add('essalud_vida')
            ->add('essalud_vidav')
            ->add('imp_renta')
            ->add('imp_rentav')
            ->add('importe_recibido')
            ->add('afecto')
            ->add('afectov')
            ->add('total')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('personal_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PersonalPago::class,
        ]);
    }
}
