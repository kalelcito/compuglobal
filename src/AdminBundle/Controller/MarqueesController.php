<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Marquees;

/**
 * Marquees controller.
 *
 * @Route("/marquees")
 */
class MarqueesController extends Controller
{
    /** index test
     * Lists all Marquees entities.
     *
     * @Route("/", name="marquees_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $marquees = $em->getRepository('CoreBundle:Marquees')->findAll();

        return $this->render('marquees/index.html.twig', array(
            'marquees' => $marquees,
        ));
    }

    /**
     * Creates a new Marquees entity.
     *
     * @Route("/new", name="marquees_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $marquee = new Marquees();
        $form = $this->createForm('CoreBundle\Form\MarqueesType', $marquee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($marquee);
            $em->flush();

            return $this->redirectToRoute('marquees_show', array('id' => $marquee->getId()));
        }

        return $this->render('marquees/new.html.twig', array(
            'marquee' => $marquee,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Marquees entity.
     *
     * @Route("/{id}", name="marquees_show")
     * @Method("GET")
     */
    public function showAction(Marquees $marquee)
    {
        $deleteForm = $this->createDeleteForm($marquee);

        return $this->render('marquees/show.html.twig', array(
            'marquee' => $marquee,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Marquees entity.
     *
     * @Route("/{id}/edit", name="marquees_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Marquees $marquee)
    {
        $deleteForm = $this->createDeleteForm($marquee);
        $editForm = $this->createForm('CoreBundle\Form\MarqueesType', $marquee);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($marquee);
            $em->flush();

            //return $this->redirectToRoute('marquees_edit', array('id' => $marquee->getId()));
            return $this->redirectToRoute('marquees_index');

        }

        return $this->render('marquees/edit.html.twig', array(
            'marquee' => $marquee,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Marquees entity.
     *
     * @Route("/{id}", name="marquees_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Marquees $marquee)
    {
        $form = $this->createDeleteForm($marquee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($marquee);
            $em->flush();
        }

        return $this->redirectToRoute('marquees_index');
    }

    /**
     * Creates a form to delete a Marquees entity.
     *
     * @param Marquees $marquee The Marquees entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Marquees $marquee)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('marquees_delete', array('id' => $marquee->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
