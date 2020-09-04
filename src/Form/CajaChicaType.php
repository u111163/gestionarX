<?php

namespace App\Form;

use App\Entity\CajaChica;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CajaChicaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('denominacion')
            ->add('moneda')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('empresa_id')
            ->add('usuario_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CajaChica::class,
        ]);
    }
}
