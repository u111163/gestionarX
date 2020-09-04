<?php

namespace App\Form;

use App\Entity\Cliente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ubigeo')
            ->add('documento')
            ->add('razonsocial')
            ->add('direccion')
            ->add('telff')
            ->add('telfc')
            ->add('contacto')
            ->add('email1')
            ->add('email2')
            ->add('escliente')
            ->add('esproveedor')
            ->add('estado')
            ->add('create_at')
            ->add('updated_at')
            ->add('empresa_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cliente::class,
        ]);
    }
}
