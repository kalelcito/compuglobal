<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Contacto;

/**
 * Contactos controller.
 *
 * @Route("/contactos")
 */
class ContactoController extends Controller
{
    /** index test
     * Lists all Contactos entities.
     *
     * @Route("/", name="contactos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contactos = $em->getRepository('CoreBundle:Contacto')->findBy(array(),array('updated_at'=>'DESC'));

        return $this->render('contacto/index.html.twig', array(
            'contactos' => $contactos,
        ));
    }

    /**
     * Finds and displays a Contactos entity.
     *
     * @Route("/{id}", name="contactos_show")
     * @Method("GET")
     */
    public function showAction(Contacto $contacto)
    {

        return $this->render('contacto/show.html.twig', array(
            'contacto' => $contacto
        ));
    }
}
