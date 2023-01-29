<?php

namespace App\Form;

use App\Entity\Clientes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('clienteCod')
            ->add('nombre')
            ->add('Direc')
            ->add('ciudad')
            ->add('estado')
            ->add('CodPostal')
            ->add('area')
            ->add('telefono')
            ->add('ReprCod')
            ->add('LimiteCredito')
            ->add('Observaciones')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clientes::class,
        ]);
    }
}
