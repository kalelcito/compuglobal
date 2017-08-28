<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImagenEnlaceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imagen',FileType::class,array('required'=>false,'data_class'=>null,'attr'=>array('ruta'=>'images')))
            ->add('enlace',TextType::class,array('required'=>true))
            ->add('tipo',ChoiceType::class,array('required'=>true,'choices'=>array('Seccion Enlace Chico'=>'1','Seccion Enlace Grande'=>'2','TagMarketing'=>'3')))
            ->add('activo')
            ;
}

/**
* {@inheritdoc}
*/
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'CoreBundle\Entity\ImagenEnlace'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_imagenenlace';
}


}
