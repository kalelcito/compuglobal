<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModalsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo',TextType::class,array('required'=>true))
            ->add('descripcion',TextareaType::class,array('attr'=>array('rows'=>'5')))
            ->add('imagen',FileType::class,array('required'=>false,'data_class'=>null,'attr'=>array('ruta'=>'images')))
            ->add('tipo',ChoiceType::class,array('required'=>true,'choices'=>array(
                'Normal'=>'1',
                'Menu Productos'=>'2',
                'Menu Marcas'=>'3',
                'Menu Hot Sale'=>'4',
                'Especial - Cursos Chico'=>'5',
                'Especial - Cursos Grande'=>'6')))
            ->add('texto_alternativo',TextType::class,array('required'=>false,'label'=>'Texto para Modal Especial'))
            ->add('imagen_alternativa',FileType::class,array('label'=>'Imagen para Modal Especial Grande','required'=>false,'data_class'=>null,'attr'=>array('ruta'=>'images')))
            ->add('activo')
            ;
}

/**
* {@inheritdoc}
*/
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'CoreBundle\Entity\Modals'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_modals';
}


}
