<?php

namespace CoreBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CursoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha',DateType::class,array('required'=>false,'widget'=>'single_text','html5'=>false,'attr'=>['class'=>'js-datepicker']))
            ->add('titulo',TextType::class,array('required'=>true))
            ->add('imagen',FileType::class,array('required'=>false,'data_class'=>null,'attr'=>array('ruta'=>'images')))
            ->add('precio',MoneyType::class, array('currency'=>'MXN','grouping'=>true,'invalid_message'=>'Revisa el Precio'))
            ->add('contenido',CKEditorType::class)
            ->add('color_fondo',TextType::class,array('required'=>true,'attr'=>array('class'=>'colorpicker')))
            ->add('color_titulo',TextType::class,array('required'=>true,'attr'=>array('class'=>'colorpicker')))
            ->add('color_fecha',TextType::class,array('required'=>true,'attr'=>array('class'=>'colorpicker')))
            ->add('activo')
            ->add('slug',TextType::class,array('disabled'=>true))
            ->add('metakeys',TextareaType::class,array('required'=>false,'label'=>'Metakeys separadas por coma (,)','attr'=>array('rows'=>'5')))
            ->add('metadesc',TextareaType::class,array('required'=>false,'attr'=>array('rows'=>'5')))
            ;
}

/**
* {@inheritdoc}
*/
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'CoreBundle\Entity\Curso'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_curso';
}


}
