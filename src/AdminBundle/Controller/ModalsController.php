<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Modals;
use CoreBundle\Form\ModalsType;

/**
 * Modals controller.
 *
 * @Route("/modals")
 */
class ModalsController extends Controller
{
    /** index test
     * Lists all Modals entities.
     *
     * @Route("/", name="modals_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $modals = $em->getRepository('CoreBundle:Modals')->findAll();

        return $this->render('modals/index.html.twig', array(
            'modals' => $modals,
        ));
    }

    /**
     * Creates a new Modals entity.
     *
     * @Route("/new", name="modals_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $modal = new Modals();
        $form = $this->createForm('CoreBundle\Form\ModalsType', $modal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($modal->getImagen()){
                $file = $modal->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $modal->setImagen($fileName);
            }
            if($modal->getImagenAlternativa()){
                $file = $modal->getImagenAlternativa();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $modal->setImagenAlternativa($fileName);
            }

            $em->persist($modal);
            $em->flush();

            return $this->redirectToRoute('modals_show', array('id' => $modal->getId()));
        }

        return $this->render('modals/new.html.twig', array(
            'modal' => $modal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Modals entity.
     *
     * @Route("/{id}", name="modals_show")
     * @Method("GET")
     */
    public function showAction(Modals $modal)
    {
        $deleteForm = $this->createDeleteForm($modal);

        return $this->render('modals/show.html.twig', array(
            'modal' => $modal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Modals entity.
     *
     * @Route("/{id}/edit", name="modals_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Modals $modal)
    {
        $deleteForm = $this->createDeleteForm($modal);
        $editForm = $this->createForm('CoreBundle\Form\ModalsType', $modal);
        $tmp = $modal->getImagen();
        $tmp2 = $modal->getImagenAlternativa();
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($modal->getImagen()){
                $file = $modal->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $modal->setImagen($fileName);
            }else{
                $modal->setImagen($tmp);
            }

            if($modal->getImagenAlternativa()){
                $file = $modal->getImagenAlternativa();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $modal->setImagenAlternativa($fileName);
            }else{
                $modal->setImagenAlternativa($tmp2);
            }

            $em->persist($modal);
            $em->flush();

            //return $this->redirectToRoute('modals_edit', array('id' => $modal->getId()));
            return $this->redirectToRoute('modals_index');

        }

        return $this->render('modals/edit.html.twig', array(
            'modal' => $modal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Modals entity.
     *
     * @Route("/{id}", name="modals_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Modals $modal)
    {
        $form = $this->createDeleteForm($modal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            unlink($this->getParameter('img_directory').'/'.$modal->getImagen());
            unlink($this->getParameter('img_directory').'/'.$modal->getImagenAlternativa());
            $em->remove($modal);
            $em->flush();
        }

        return $this->redirectToRoute('modals_index');
    }

    /**
     * Creates a form to delete a Modals entity.
     *
     * @param Modals $modal The Modals entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Modals $modal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('modals_delete', array('id' => $modal->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
