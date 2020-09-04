<?php

namespace App\Form;

use App\Entity\Personal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombres')
            ->add('foto')
            ->add('dni')
            ->add('ruc')
            ->add('afp')
            ->add('fecha_nacimiento')
            ->add('cuspp')
            ->add('cargo')
            ->add('fecha_ingreso')
            ->add('es_planilla')
            ->add('es_honorario')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('empresa_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personal::class,
        ]);
    }
}
