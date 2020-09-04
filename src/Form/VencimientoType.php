<?php

namespace App\Form;

use App\Entity\Vencimiento;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VencimientoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dias')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('empresa_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vencimiento::class,
        ]);
    }
}
