<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Soluciones;
use CoreBundle\Form\SolucionesType;

/**
 * Soluciones controller.
 *
 * @Route("/soluciones")
 */
class SolucionesController extends Controller
{
    /** index test
     * Lists all Soluciones entities.
     *
     * @Route("/", name="soluciones_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $soluciones = $em->getRepository('CoreBundle:Soluciones')->findAll();

        return $this->render('soluciones/index.html.twig', array(
            'soluciones' => $soluciones,
        ));
    }

    /**
     * Creates a new Soluciones entity.
     *
     * @Route("/new", name="soluciones_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $solucione = new Soluciones();
        $form = $this->createForm('CoreBundle\Form\SolucionesType', $solucione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($solucione->getImagen()){
                $file = $solucione->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $solucione->setImagen($fileName);
            }

            $em->persist($solucione);
            $em->flush();

            return $this->redirectToRoute('soluciones_show', array('id' => $solucione->getId()));
        }

        return $this->render('soluciones/new.html.twig', array(
            'solucione' => $solucione,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Soluciones entity.
     *
     * @Route("/{id}", name="soluciones_show")
     * @Method("GET")
     */
    public function showAction(Soluciones $solucione)
    {
        $deleteForm = $this->createDeleteForm($solucione);

        return $this->render('soluciones/show.html.twig', array(
            'solucione' => $solucione,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Soluciones entity.
     *
     * @Route("/{id}/edit", name="soluciones_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Soluciones $solucione)
    {
        $deleteForm = $this->createDeleteForm($solucione);
        $editForm = $this->createForm('CoreBundle\Form\SolucionesType', $solucione);
        $tmp = $solucione->getImagen();
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($solucione->getImagen()){
                $file = $solucione->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $solucione->setImagen($fileName);
            }else{
                $solucione->setImagen($tmp);
            }

            $em->persist($solucione);
            $em->flush();

            //return $this->redirectToRoute('soluciones_edit', array('id' => $solucione->getId()));
            return $this->redirectToRoute('soluciones_index');

        }

        return $this->render('soluciones/edit.html.twig', array(
            'solucione' => $solucione,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Soluciones entity.
     *
     * @Route("/{id}", name="soluciones_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Soluciones $solucione)
    {
        $form = $this->createDeleteForm($solucione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            unlink($this->getParameter('img_directory').'/'.$solucione->getImagen());
            $em->remove($solucione);
            $em->flush();
        }

        return $this->redirectToRoute('soluciones_index');
    }

    /**
     * Creates a form to delete a Soluciones entity.
     *
     * @param Soluciones $solucione The Soluciones entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Soluciones $solucione)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('soluciones_delete', array('id' => $solucione->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
