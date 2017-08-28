<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\ImagenEnlace;
use CoreBundle\Form\ImagenEnlaceType;

/**
 * ImagenEnlace controller.
 *
 * @Route("/imagenenlace")
 */
class ImagenEnlaceController extends Controller
{
    /** index test
     * Lists all ImagenEnlace entities.
     *
     * @Route("/", name="imagenenlace_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $imagenEnlaces = $em->getRepository('CoreBundle:ImagenEnlace')->findAll();

        return $this->render('imagenenlace/index.html.twig', array(
            'imagenEnlaces' => $imagenEnlaces,
        ));
    }

    /**
     * Creates a new ImagenEnlace entity.
     *
     * @Route("/new", name="imagenenlace_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $imagenEnlace = new ImagenEnlace();
        $form = $this->createForm('CoreBundle\Form\ImagenEnlaceType', $imagenEnlace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($imagenEnlace->getImagen()){
                $file = $imagenEnlace->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $imagenEnlace->setImagen($fileName);
            }

            $em->persist($imagenEnlace);
            $em->flush();

            return $this->redirectToRoute('imagenenlace_show', array('id' => $imagenEnlace->getId()));
        }

        return $this->render('imagenenlace/new.html.twig', array(
            'imagenEnlace' => $imagenEnlace,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ImagenEnlace entity.
     *
     * @Route("/{id}", name="imagenenlace_show")
     * @Method("GET")
     */
    public function showAction(ImagenEnlace $imagenEnlace)
    {
        $deleteForm = $this->createDeleteForm($imagenEnlace);

        return $this->render('imagenenlace/show.html.twig', array(
            'imagenEnlace' => $imagenEnlace,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ImagenEnlace entity.
     *
     * @Route("/{id}/edit", name="imagenenlace_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ImagenEnlace $imagenEnlace)
    {
        $deleteForm = $this->createDeleteForm($imagenEnlace);
        $editForm = $this->createForm('CoreBundle\Form\ImagenEnlaceType', $imagenEnlace);
        $tmp = $imagenEnlace->getImagen();
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($imagenEnlace->getImagen()){
                $file = $imagenEnlace->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $imagenEnlace->setImagen($fileName);
            }else{
                $imagenEnlace->setImagen($tmp);
            }

            $em->persist($imagenEnlace);
            $em->flush();

            //return $this->redirectToRoute('imagenenlace_edit', array('id' => $imagenEnlace->getId()));
            return $this->redirectToRoute('imagenenlace_index');

        }

        return $this->render('imagenenlace/edit.html.twig', array(
            'imagenEnlace' => $imagenEnlace,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ImagenEnlace entity.
     *
     * @Route("/{id}", name="imagenenlace_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ImagenEnlace $imagenEnlace)
    {
        $form = $this->createDeleteForm($imagenEnlace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            unlink($this->getParameter('img_directory').'/'.$imagenEnlace->getImagen());
            $em->remove($imagenEnlace);
            $em->flush();
        }

        return $this->redirectToRoute('imagenenlace_index');
    }

    /**
     * Creates a form to delete a ImagenEnlace entity.
     *
     * @param ImagenEnlace $imagenEnlace The ImagenEnlace entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ImagenEnlace $imagenEnlace)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('imagenenlace_delete', array('id' => $imagenEnlace->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
