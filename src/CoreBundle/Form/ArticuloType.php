<?php

namespace CoreBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticuloType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imagen',FileType::class,array('required'=>false,'data_class'=>null,'attr'=>array('ruta'=>'images')))
            ->add('titulo')
            ->add('descripcion',TextType::class,array('label'=>'Descripcion Corta (max. 30 caracteres)'))
            ->add('contenido',CKEditorType::class)
            ->add('fuente')
            ->add('activo')
            ->add('slug',TextType::class,array('disabled'=>true))
            ->add('metakeys',TextareaType::class,array('attr'=>array('rows'=>'5'),'label'=>'Metakeys separados por coma (,)'))
            ->add('metadesc',TextareaType::class,array('attr'=>array('rows'=>'5')))
        ;
}

/**
* {@inheritdoc}
*/
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'CoreBundle\Entity\Articulo'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_articulo';
}


}
