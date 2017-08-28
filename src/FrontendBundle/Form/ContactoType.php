<?php

namespace FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class,array('attr'=>array('placeholder'=>'Nombre'),'required'=>true,'constraints' => array(
                new NotBlank(array(
                    'message' => 'Ingresa tu Nombre',
                )),
                new Length(array('min' => 4,
                    'minMessage' => 'Tu nombre debe ser mayor a {{ limit }} caracteres',))
            )))
            ->add('empresa',TextType::class,array('attr'=>array('placeholder'=>'Empresa'),'required'=>false,'constraints' => array(
                new Length(array('min' => 4,
                    'minMessage' => 'Tu empresa debe ser mayor a {{ limit }} caracteres',))
            )))
            ->add('email',EmailType::class,array('attr'=>array('placeholder'=>'E-mail'),'required'=>true,
                'constraints' => array(
                    new Email(array(
                        'message' => 'El correo electrónico \'{{ value }}\' no es válido',
                    )),
                    new NotBlank(array(
                        'message' => 'Ingresa un correo electrónico',
                    ))
                ),'trim'=>true))
            ->add('telefono',TextType::class,array('attr'=>array('placeholder'=>'Teléfono'),'required'=>false,'constraints' => array(
                new Length(array('min' => 7,
                    'minMessage' => 'Tu telefono debe ser mayor a {{ limit }} caracteres',))
            )))
            ->add('comentarios',TextareaType::class,array('attr'=>array('rows'=>'5','placeholder'=>'Comentarios'),'required'=>true,'constraints' => array(
                new NotBlank(array(
                    'message' => 'Ingresa tus Comentarios',
                )),
                new Length(array('min' => 10,
                    'minMessage' => 'Tu comentario debe ser mayor a {{ limit }} caracteres',))
            )))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'contacto';
    }
}
