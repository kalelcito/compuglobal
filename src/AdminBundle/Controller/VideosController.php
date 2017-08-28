<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Videos;
use CoreBundle\Form\VideosType;

/**
 * Videos controller.
 *
 * @Route("/videos")
 */
class VideosController extends Controller
{
    /** index test
     * Lists all Videos entities.
     *
     * @Route("/", name="videos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $videos = $em->getRepository('CoreBundle:Videos')->findAll();

        return $this->render('videos/index.html.twig', array(
            'videos' => $videos,
        ));
    }

    /**
     * Creates a new Videos entity.
     *
     * @Route("/new", name="videos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $video = new Videos();
        $form = $this->createForm('CoreBundle\Form\VideosType', $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $url = $video->getLinkYoutube();
            preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
            $video->setYoutubeId($matches[1]);
            $em->persist($video);
            $em->flush();

            return $this->redirectToRoute('videos_show', array('id' => $video->getId()));
        }

        return $this->render('videos/new.html.twig', array(
            'video' => $video,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Videos entity.
     *
     * @Route("/{id}", name="videos_show")
     * @Method("GET")
     */
    public function showAction(Videos $video)
    {
        $deleteForm = $this->createDeleteForm($video);

        return $this->render('videos/show.html.twig', array(
            'video' => $video,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Videos entity.
     *
     * @Route("/{id}/edit", name="videos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Videos $video)
    {
        $deleteForm = $this->createDeleteForm($video);
        $editForm = $this->createForm('CoreBundle\Form\VideosType', $video);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $url = $video->getLinkYoutube();
            preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
            $video->setYoutubeId($matches[1]);
            $em->persist($video);
            $em->flush();

            //return $this->redirectToRoute('videos_edit', array('id' => $video->getId()));
            return $this->redirectToRoute('videos_index');

        }

        return $this->render('videos/edit.html.twig', array(
            'video' => $video,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Videos entity.
     *
     * @Route("/{id}", name="videos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Videos $video)
    {
        $form = $this->createDeleteForm($video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($video);
            $em->flush();
        }

        return $this->redirectToRoute('videos_index');
    }

    /**
     * Creates a form to delete a Videos entity.
     *
     * @param Videos $video The Videos entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Videos $video)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('videos_delete', array('id' => $video->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
