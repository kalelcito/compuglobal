<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PedidosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad',IntegerType::class,array('required'=>true,'attr'=>array('min'=>'0','step'=>'1','class'=>'quantity')))
            ->add('total',MoneyType::class, array('currency'=>'MXN','grouping'=>true,'disabled'=>true,'attr'=>array('class'=>'precio')))
            ->add('status',ChoiceType::class,array('required'=>true,'choices'=>array('Solicitado'=>'1','Enviado'=>'2','Entregado'=>'3','Cancelado'=>'4')))
        ;
}

/**
* {@inheritdoc}
*/
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'CoreBundle\Entity\Pedidos'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_pedidos';
}


}
