<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('link_youtube',TextType::class,array('required'=>true))
            ->add('titulo',TextType::class,array('required'=>true,'label'=>'Titulo (máx. 100 caracteres)'))
            ->add('descripcion',TextType::class,array('label'=>'Descripcion (máx. 150 caracteres)'))
            ->add('orden',IntegerType::class,array('required'=>true,'attr'=>array('min'=>'0','step'=>'1')))
            ->add('activo')
            ;
}

/**
* {@inheritdoc}
*/
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'CoreBundle\Entity\Videos'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_videos';
}


}
