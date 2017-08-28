<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
}
