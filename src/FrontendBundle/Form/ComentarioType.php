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

class ComentarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nickname',TextType::class,array('required'=>true,'constraints' => array(
                new NotBlank(array(
                    'message' => 'Ingresa un Nickname',
                )),
                new Length(array('min' => 4,
                    'minMessage' => 'El nickname debe ser mayor a {{ limit }} caracteres',))
            )))
            ->add('email',EmailType::class,array('required'=>true,
                'constraints' => array(
                    new Email(array(
                        'message' => 'El correo electrónico \'{{ value }}\' no es válido',
                    )),
                    new NotBlank(array(
                        'message' => 'Ingresa un correo electrónico',
                    ))
                ),'trim'=>true))
            ->add('comentario',TextareaType::class,array('attr'=>array('rows'=>'5'),'required'=>true,'constraints' => array(
                new Length(array('min' => 10,
                    'minMessage' => 'El comentario debe ser mayor a {{ limit }} caracteres',))
            )))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'comentario';
    }
}
