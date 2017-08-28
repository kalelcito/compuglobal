<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\ArticuloSimple;
use CoreBundle\Form\ArticuloSimpleType;

/**
 * ArticuloSimple controller.
 *
 * @Route("/articulosimple")
 */
class ArticuloSimpleController extends Controller
{
    /** index test
     * Lists all ArticuloSimple entities.
     *
     * @Route("/", name="articulosimple_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articuloSimples = $em->getRepository('CoreBundle:ArticuloSimple')->findAll();

        return $this->render('articulosimple/index.html.twig', array(
            'articuloSimples' => $articuloSimples,
        ));
    }

    /**
     * Creates a new ArticuloSimple entity.
     *
     * @Route("/new", name="articulosimple_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $articuloSimple = new ArticuloSimple();
        $form = $this->createForm('CoreBundle\Form\ArticuloSimpleType', $articuloSimple);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($articuloSimple->getImagen()){
                $file = $articuloSimple->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $articuloSimple->setImagen($fileName);
            }

            $em->persist($articuloSimple);
            $em->flush();

            return $this->redirectToRoute('articulosimple_show', array('id' => $articuloSimple->getId()));
        }

        return $this->render('articulosimple/new.html.twig', array(
            'articuloSimple' => $articuloSimple,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ArticuloSimple entity.
     *
     * @Route("/{id}", name="articulosimple_show")
     * @Method("GET")
     */
    public function showAction(ArticuloSimple $articuloSimple)
    {
        $deleteForm = $this->createDeleteForm($articuloSimple);

        return $this->render('articulosimple/show.html.twig', array(
            'articuloSimple' => $articuloSimple,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ArticuloSimple entity.
     *
     * @Route("/{id}/edit", name="articulosimple_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ArticuloSimple $articuloSimple)
    {
        $deleteForm = $this->createDeleteForm($articuloSimple);
        $editForm = $this->createForm('CoreBundle\Form\ArticuloSimpleType', $articuloSimple);
        $tmp = $articuloSimple->getImagen();
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($articuloSimple->getImagen()){
                $file = $articuloSimple->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $articuloSimple->setImagen($fileName);
            }else{
                $articuloSimple->setImagen($tmp);
            }

            $em->persist($articuloSimple);
            $em->flush();

            //return $this->redirectToRoute('articulosimple_edit', array('id' => $articuloSimple->getId()));
            return $this->redirectToRoute('articulosimple_index');

        }

        return $this->render('articulosimple/edit.html.twig', array(
            'articuloSimple' => $articuloSimple,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ArticuloSimple entity.
     *
     * @Route("/{id}", name="articulosimple_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ArticuloSimple $articuloSimple)
    {
        $form = $this->createDeleteForm($articuloSimple);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            unlink($this->getParameter('img_directory').'/'.$articuloSimple->getImagen());
            $em->remove($articuloSimple);
            $em->flush();
        }

        return $this->redirectToRoute('articulosimple_index');
    }

    /**
     * Creates a form to delete a ArticuloSimple entity.
     *
     * @param ArticuloSimple $articuloSimple The ArticuloSimple entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ArticuloSimple $articuloSimple)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('articulosimple_delete', array('id' => $articuloSimple->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
