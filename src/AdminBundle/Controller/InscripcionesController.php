<?php

namespace AdminBundle\Controller;

use CoreBundle\Entity\Inscripciones;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Inscripciones controller.
 *
 * @Route("/inscripciones")
 */
class InscripcionesController extends Controller
{
    /** index test
     * Lists all INscripciones entities.
     *
     * @Route("/", name="inscripciones_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $inscripciones = $em->getRepository('CoreBundle:Inscripciones')->findBy(array(),array('updated_at'=>'DESC'));

        return $this->render('inscripciones/index.html.twig', array(
            'inscripciones' => $inscripciones,
        ));
    }

    /**
     * Finds and displays a Inscripciones entity.
     *
     * @Route("/{id}", name="inscripciones_show")
     * @Method("GET")
     */
    public function showAction(Inscripciones $inscripciones)
    {

        return $this->render('inscripciones/show.html.twig', array(
            'inscripciones' => $inscripciones
        ));
    }
}
