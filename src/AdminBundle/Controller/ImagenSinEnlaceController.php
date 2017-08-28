<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\ImagenSinEnlace;
use CoreBundle\Form\ImagenSinEnlaceType;

/**
 * ImagenSinEnlace controller.
 *
 * @Route("/imagensinenlace")
 */
class ImagenSinEnlaceController extends Controller
{
    /** index test
     * Lists all ImagenSinEnlace entities.
     *
     * @Route("/", name="imagensinenlace_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $imagenSinEnlaces = $em->getRepository('CoreBundle:ImagenSinEnlace')->findAll();

        return $this->render('imagensinenlace/index.html.twig', array(
            'imagenSinEnlaces' => $imagenSinEnlaces,
        ));
    }

    /**
     * Creates a new ImagenSinEnlace entity.
     *
     * @Route("/new", name="imagensinenlace_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $imagenSinEnlace = new ImagenSinEnlace();
        $form = $this->createForm('CoreBundle\Form\ImagenSinEnlaceType', $imagenSinEnlace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($imagenSinEnlace->getImagen()){
                $file = $imagenSinEnlace->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $imagenSinEnlace->setImagen($fileName);
            }

            $em->persist($imagenSinEnlace);
            $em->flush();

            return $this->redirectToRoute('imagensinenlace_show', array('id' => $imagenSinEnlace->getId()));
        }

        return $this->render('imagensinenlace/new.html.twig', array(
            'imagenSinEnlace' => $imagenSinEnlace,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ImagenSinEnlace entity.
     *
     * @Route("/{id}", name="imagensinenlace_show")
     * @Method("GET")
     */
    public function showAction(ImagenSinEnlace $imagenSinEnlace)
    {
        $deleteForm = $this->createDeleteForm($imagenSinEnlace);

        return $this->render('imagensinenlace/show.html.twig', array(
            'imagenSinEnlace' => $imagenSinEnlace,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ImagenSinEnlace entity.
     *
     * @Route("/{id}/edit", name="imagensinenlace_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ImagenSinEnlace $imagenSinEnlace)
    {
        $deleteForm = $this->createDeleteForm($imagenSinEnlace);
        $editForm = $this->createForm('CoreBundle\Form\ImagenSinEnlaceType', $imagenSinEnlace);
        $tmp = $imagenSinEnlace->getImagen();
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($imagenSinEnlace->getImagen()){
                $file = $imagenSinEnlace->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $imagenSinEnlace->setImagen($fileName);
            }else{
                $imagenSinEnlace->setImagen($tmp);
            }

            $em->persist($imagenSinEnlace);
            $em->flush();

            //return $this->redirectToRoute('imagensinenlace_edit', array('id' => $imagenSinEnlace->getId()));
            return $this->redirectToRoute('imagensinenlace_index');

        }

        return $this->render('imagensinenlace/edit.html.twig', array(
            'imagenSinEnlace' => $imagenSinEnlace,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ImagenSinEnlace entity.
     *
     * @Route("/{id}", name="imagensinenlace_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ImagenSinEnlace $imagenSinEnlace)
    {
        $form = $this->createDeleteForm($imagenSinEnlace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            unlink($this->getParameter('img_directory').'/'.$imagenSinEnlace->getImagen());
            $em->remove($imagenSinEnlace);
            $em->flush();
        }

        return $this->redirectToRoute('imagensinenlace_index');
    }

    /**
     * Creates a form to delete a ImagenSinEnlace entity.
     *
     * @param ImagenSinEnlace $imagenSinEnlace The ImagenSinEnlace entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ImagenSinEnlace $imagenSinEnlace)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('imagensinenlace_delete', array('id' => $imagenSinEnlace->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
