<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('FrontendBundle:Default:index.html.twig');
    }

    /**
     * @Route("/about-us", name="about")
     */
    public function aboutAction()
    {
        return $this->render('FrontendBundle:Default:about.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return $this->render('FrontendBundle:Default:contact.html.twig');
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function blogAction()
    {
        return $this->render('FrontendBundle:Default:blog.html.twig');
    }

    /**
     * @Route("/courses", name="courses")
     */
    public function coursesAction()
    {
        return $this->render('FrontendBundle:Default:courses.html.twig');
    }

    /**
     * @Route("/promotions", name="promotions")
     */
    public function promotionsAction()
    {
        return $this->render('FrontendBundle:Default:promotions.html.twig');
    }

    /**
     * @Route("/article/{slug}", name="article")
     */
    public function articleAction($slug)
    {
        return $this->render('FrontendBundle:Default:article.html.twig',array('nombre'=>$slug));
    }

    /**
     * @Route("/course/{slug}", name="course")
     */
    public function courseAction($slug)
    {
        return $this->render('FrontendBundle:Default:course.html.twig',array('nombre'=>$slug));
    }
}
