<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Articulo;
use CoreBundle\Form\ArticuloType;

/**
 * Articulo controller.
 *
 * @Route("/articulo")
 */
class ArticuloController extends Controller
{
    /** index test
     * Lists all Articulo entities.
     *
     * @Route("/", name="articulo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articulos = $em->getRepository('CoreBundle:Articulo')->findAll();

        return $this->render('articulo/index.html.twig', array(
            'articulos' => $articulos,
        ));
    }

    /**
     * Creates a new Articulo entity.
     *
     * @Route("/new", name="articulo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $articulo = new Articulo();
        $form = $this->createForm('CoreBundle\Form\ArticuloType', $articulo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($articulo->getImagen()){
                $file = $articulo->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $articulo->setImagen($fileName);
            }

            $em->persist($articulo);
            $em->flush();

            return $this->redirectToRoute('articulo_show', array('id' => $articulo->getId()));
        }

        return $this->render('articulo/new.html.twig', array(
            'articulo' => $articulo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Articulo entity.
     *
     * @Route("/{id}", name="articulo_show")
     * @Method("GET")
     */
    public function showAction(Articulo $articulo)
    {
        $deleteForm = $this->createDeleteForm($articulo);

        return $this->render('articulo/show.html.twig', array(
            'articulo' => $articulo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Articulo entity.
     *
     * @Route("/{id}/edit", name="articulo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Articulo $articulo)
    {
        $deleteForm = $this->createDeleteForm($articulo);
        $editForm = $this->createForm('CoreBundle\Form\ArticuloType', $articulo);
        $tmp = $articulo->getImagen();
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($articulo->getImagen()){
                $file = $articulo->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $articulo->setImagen($fileName);
            }else{
                $articulo->setImagen($tmp);
            }

            $em->persist($articulo);
            $em->flush();

            //return $this->redirectToRoute('articulo_edit', array('id' => $articulo->getId()));
            return $this->redirectToRoute('articulo_index');

        }

        return $this->render('articulo/edit.html.twig', array(
            'articulo' => $articulo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Articulo entity.
     *
     * @Route("/{id}", name="articulo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Articulo $articulo)
    {
        $form = $this->createDeleteForm($articulo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            unlink($this->getParameter('img_directory').'/'.$articulo->getImagen());
            $em->remove($articulo);
            $em->flush();
        }

        return $this->redirectToRoute('articulo_index');
    }

    /**
     * Creates a form to delete a Articulo entity.
     *
     * @param Articulo $articulo The Articulo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Articulo $articulo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('articulo_delete', array('id' => $articulo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
