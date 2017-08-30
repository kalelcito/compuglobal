<?php

namespace FrontendBundle\Controller;

use CoreBundle\Entity\Suscripcion;
use FrontendBundle\Form\RegistroType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class partialsController extends Controller
{
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $productos = $em->getRepository('CoreBundle:Modals')->findOneBy(array('activo'=>1,'tipo'=>2),array('updated_at'=>'DESC'));
        $marcas = $em->getRepository('CoreBundle:Modals')->findOneBy(array('activo'=>1,'tipo'=>3),array('updated_at'=>'DESC'));
        $hot = $em->getRepository('CoreBundle:Modals')->findOneBy(array('activo'=>1,'tipo'=>4),array('updated_at'=>'DESC'));
        return $this->render('@Frontend/partials/menu2.html.twig', array('producto' => $productos,'marca'=>$marcas,'hot'=>$hot));
    }

    /**
     * @Route("/registro", name="registro")
     */
    public function  registroAction(Request $request){
        $form = $this->createForm(RegistroType::class,null,array(
            'method' => 'POST',
            'attr'=>array('id'=>'registro-form')
        ));

        $em = $this->getDoctrine()->getManager();
        $enviado=0;
        $errores=array();
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $data = $form->getData();
            $encoders = array(new XmlEncoder(), new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);
            $validator = $this->get('validator');

            $cliente = $serializer->deserialize(json_encode($data), Suscripcion::class, 'json');

            $errors = $validator->validate($cliente);
            if($form->isValid() && count($errors)==0){

                $buscar = $em->getRepository('CoreBundle:Suscripcion')->findBy(array('email'=>$data['email']));
                if(!$buscar){
                    $suscripcion = new Suscripcion();
                    $suscripcion->setNombre($data['nombre']);
                    $suscripcion->setEmail($data['email']);
                    $suscripcion->setActivo(1);

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($suscripcion);
                    $em->flush();

                    $message = \Swift_Message::newInstance()
                        ->setSubject('Registro - WebPage Compuglobal')
                        ->setFrom($data['email'])
                        ->setTo(array('mercadotecnia@compuglobal.com.mx'))
                        //->setTo(array('cesar@innology.mx'))
                        ->setBody(
                            $this->renderView('@Frontend/mail/suscripcion.html.twig',array('contacto'=>$data)),
                            'text/html'
                        )
                    ;
                    $this->get('mailer')->send($message);
                    $enviado=1;
                }else{
                    $enviado=2;
                }
            }else{
                $enviado=0;
                foreach ($errors as $key=>$error) {
                    $errores[]=array('campo'=>$error->getpropertyPath(),'mensaje'=> $error->getMessage());
                }
            }
            $status = array('status'=>$enviado,'errores'=>$errores);
            return new JsonResponse($status);
        }
        return $this->render('@Frontend/partials/registro.html.twig', array('form' => $form->createView()));
    }
}
