<?php

namespace FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PedidoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class,array('required'=>true))
            ->add('email',EmailType::class,array('required'=>true,'attr'=>array('autocomplete'=>'off')))
            ->add('telefono',TextType::class,array('required'=>true))
            ->add('cantidad',IntegerType::class,array('required'=>true,'attr'=>array('min'=>'1','step'=>'1','precio'=>'')))
            ->add('sku',TextType::class,array('required'=>false))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'pedido';
    }
}
