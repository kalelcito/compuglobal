<?php

namespace AdminBundle\Controller;

use CoreBundle\Entity\Suscripcion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Suscripciones controller.
 *
 * @Route("/suscripciones")
 */
class SuscripcionesController extends Controller
{
    /** index test
     * Lists all Suscripciones entities.
     *
     * @Route("/", name="suscripciones_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $suscripciones = $em->getRepository('CoreBundle:Suscripcion')->findBy(array(),array('updated_at'=>'DESC'));

        return $this->render('suscripciones/index.html.twig', array(
            'suscripciones' => $suscripciones,
        ));
    }

    /**
     * Finds and displays a Suscripciones entity.
     *
     * @Route("/{id}", name="suscripciones_show")
     * @Method("GET")
     */
    public function showAction(Suscripcion $suscripcion)
    {

        return $this->render('suscripciones/show.html.twig', array(
            'suscripciones' => $suscripcion
        ));
    }
}
