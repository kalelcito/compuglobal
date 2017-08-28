<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Comentarios;

/**
 * Comentarios controller.
 *
 * @Route("/comentarios")
 */
class ComentariosController extends Controller
{
    /** index test
     * Lists all Comentarios entities.
     *
     * @Route("/", name="comentarios_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $comentarios = $em->getRepository('CoreBundle:Comentarios')->findBy(array(),array('updated_at'=>'DESC'));

        return $this->render('comentarios/index.html.twig', array(
            'comentarios' => $comentarios,
        ));
    }

    /**
     * Creates a new Comentarios entity.
     *
     * @Route("/new", name="comentarios_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $comentario = new Comentarios();
        $form = $this->createForm('CoreBundle\Form\ComentariosType', $comentario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comentario);
            $em->flush();

            return $this->redirectToRoute('comentarios_show', array('id' => $comentario->getId()));
        }

        return $this->render('comentarios/new.html.twig', array(
            'comentario' => $comentario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Comentarios entity.
     *
     * @Route("/{id}", name="comentarios_show")
     * @Method("GET")
     */
    public function showAction(Comentarios $comentario)
    {
        $deleteForm = $this->createDeleteForm($comentario);

        return $this->render('comentarios/show.html.twig', array(
            'comentario' => $comentario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Comentarios entity.
     *
     * @Route("/{id}/edit", name="comentarios_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Comentarios $comentario)
    {
        $deleteForm = $this->createDeleteForm($comentario);
        $editForm = $this->createForm('CoreBundle\Form\ComentariosType', $comentario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comentario);
            $em->flush();

            //return $this->redirectToRoute('comentarios_edit', array('id' => $comentario->getId()));
            return $this->redirectToRoute('comentarios_index');

        }

        return $this->render('comentarios/edit.html.twig', array(
            'comentario' => $comentario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Comentarios entity.
     *
     * @Route("/{id}", name="comentarios_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Comentarios $comentario)
    {
        $form = $this->createDeleteForm($comentario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comentario);
            $em->flush();
        }

        return $this->redirectToRoute('comentarios_index');
    }

    /**
     * Creates a form to delete a Comentarios entity.
     *
     * @param Comentarios $comentario The Comentarios entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comentarios $comentario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comentarios_delete', array('id' => $comentario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
