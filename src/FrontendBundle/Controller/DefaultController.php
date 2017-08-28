<?php

namespace FrontendBundle\Controller;

use CoreBundle\Entity\Comentarios;
use CoreBundle\Entity\Contacto;
use FrontendBundle\Form\ComentarioType;
use FrontendBundle\Form\ContactoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $marqueehome = $em->getRepository('CoreBundle:Marquees')->findBy(array('activo'=>1,'tipo'=>1),array('id'=>'ASC'));
        $tag = $em->getRepository('CoreBundle:Marquees')->findBy(array('activo'=>1,'tipo'=>2),array('id'=>'ASC'));
        $cap = $em->getRepository('CoreBundle:Marquees')->findBy(array('activo'=>1,'tipo'=>3),array('id'=>'ASC'));
        $banners = $em->getRepository('CoreBundle:Banners')->findBy(array('activo'=>1,'tipo'=>1),array('orden'=>'ASC'));
        $videos = $em->getRepository('CoreBundle:Videos')->findBy(array('activo'=>1),array('orden'=>'ASC'));
        $imagenchica = $em->getRepository('CoreBundle:ImagenEnlace')->findBy(array('activo'=>1,'tipo'=>1),array('updated_at'=>'DESC'),2);
        $capImg = $em->getRepository('CoreBundle:ImagenSinEnlace')->findBy(array('activo'=>1,'tipo'=>1),array('updated_at'=>'DESC'),1);
        $imagengrande = $em->getRepository('CoreBundle:ImagenEnlace')->findBy(array('activo'=>1,'tipo'=>2),array('updated_at'=>'DESC'),1);
        $tagimg = $em->getRepository('CoreBundle:ImagenEnlace')->findBy(array('activo'=>1,'tipo'=>3),array('updated_at'=>'DESC'),1);
        $articulosimple = $em->getRepository('CoreBundle:ArticuloSimple')->findBy(array('activo'=>1),array('updated_at'=>'DESC'));
        $soluciones = $em->getRepository('CoreBundle:Soluciones')->findBy(array('activo'=>1),array('id'=>'ASC'));
        $articulos = $em->getRepository('CoreBundle:Articulo')->findBy(array('activo'=>1),array('updated_at'=>'DESC'),3);
        return $this->render('FrontendBundle:Default:index.html.twig',array(
            'marquee_home'=>$marqueehome,
            'tag'=>$tag,
            'capa'=>$cap,
            'banners'=>$banners,
            'videos'=>$videos,
            'chica1'=>$imagenchica[0],
            'chica2'=>$imagenchica[1],
            'grande'=>$imagengrande[0],
            'tagimg'=>$tagimg[0],
            'simples'=>$articulosimple,
            'soluciones'=>$soluciones,
            'articulos'=>$articulos,
            'capaImg'=>$capImg[0]
        ));
    }

    /**
     * @Route("/about-us", name="about")
     */
    public function aboutAction()
    {
        $em = $this->getDoctrine()->getManager();
        $marquee = $em->getRepository('CoreBundle:Marquees')->findBy(array('activo'=>1,'tipo'=>4),array('id'=>'ASC'));
        $img = $em->getRepository('CoreBundle:ImagenSinEnlace')->findBy(array('activo'=>1,'tipo'=>2),array('updated_at'=>'DESC'),1);
        return $this->render('FrontendBundle:Default:about.html.twig',array('marquee'=>$marquee,'img'=>$img[0]));
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(ContactoType::class,null,array(
            'method' => 'POST',
            'attr'=>array('id'=>'contacto-form')
        ));
        $enviado=0;
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                $data = $form->getData();

                $contacto = new Contacto();
                $contacto->setNombre($data['nombre']);
                $contacto->setEmpresa($data['empresa']);
                $contacto->setEmail($data['email']);
                $contacto->setTelefono($data['telefono']);
                $contacto->setComentarios($data['comentarios']);

                $em = $this->getDoctrine()->getManager();
                $em->persist($contacto);
                $em->flush();

                $message = \Swift_Message::newInstance()
                    ->setSubject('Compuglobal WebPage - Contacto')
                    ->setFrom($data['email'])
                    //->setFrom(array('compuglobal@compuglobal.com.mx'))
                    //->setTo(array('compuglobal@compuglobal.com.mx'))
                    ->setTo(array('cesar@innology.mx'))
                    ->setBody(
                        $this->renderView('@Frontend/mail/contact.html.twig',array('contacto'=>$data)),
                        'text/html'
                    )
                ;
                $this->get('mailer')->send($message);
                $enviado=1;
            }else{
                $enviado=0;
            }
        }else{
            $enviado=0;
        }
        return $this->render('FrontendBundle:Default:contact.html.twig',array('form'=>$form->createView(),'enviado'=>$enviado));
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function blogAction()
    {
        $em = $this->getDoctrine()->getManager();
        $articulos = $em->getRepository('CoreBundle:Articulo')->findBy(array('activo'=>1),array('updated_at'=>'DESC'));
        $img = $em->getRepository('CoreBundle:ImagenSinEnlace')->findBy(array('activo'=>1,'tipo'=>3),array('updated_at'=>'DESC'),1);
        return $this->render('FrontendBundle:Default:blog.html.twig',array('articulos'=>$articulos,'img'=>$img[0]));
    }

    /**
     * @Route("/courses", name="courses")
     */
    public function coursesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $marquee = $em->getRepository('CoreBundle:Marquees')->findBy(array('activo'=>1,'tipo'=>5),array('id'=>'ASC'));
        $banners = $em->getRepository('CoreBundle:Banners')->findBy(array('activo'=>1,'tipo'=>3),array('orden'=>'ASC'));
        $chico = $em->getRepository('CoreBundle:Modals')->findOneBy(array('activo'=>1,'tipo'=>5),array('updated_at'=>'DESC'));
        $grande = $em->getRepository('CoreBundle:Modals')->findOneBy(array('activo'=>1,'tipo'=>6),array('updated_at'=>'DESC'));
        return $this->render('FrontendBundle:Default:courses.html.twig',array('marquee'=>$marquee,'banners'=>$banners,'chico'=>$chico,'grande'=>$grande));
    }

    /**
     * @Route("/promotions", name="promotions")
     */
    public function promotionsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $marquee = $em->getRepository('CoreBundle:Marquees')->findBy(array('activo'=>1,'tipo'=>6),array('id'=>'ASC'));
        $banners = $em->getRepository('CoreBundle:Banners')->findBy(array('activo'=>1,'tipo'=>2),array('orden'=>'ASC'));
        return $this->render('FrontendBundle:Default:promotions.html.twig',array('marquee'=>$marquee,'banners'=>$banners));
    }

    /**
     * @Route("/article/{slug}", name="article")
     */
    public function articleAction($slug, Request $request)
    {
        $form = $this->createForm(ComentarioType::class,null,array(
            'method' => 'POST',
            'attr'=>array('id'=>'comentario-form')
        ));

        $em = $this->getDoctrine()->getManager();
        $articulo = $em->getRepository('CoreBundle:Articulo')->findOneBy(array('activo'=>1,'slug'=>$slug));
        $img = $em->getRepository('CoreBundle:ImagenSinEnlace')->findBy(array('activo'=>1,'tipo'=>3),array('updated_at'=>'DESC'),1);

        $enviado=0;
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                $data = $form->getData();

                $comentario = new Comentarios();
                $comentario->setNickname($data['nickname']);
                $comentario->setEmail($data['email']);
                $comentario->setComentario($data['comentario']);
                $comentario->setActivo(1);
                $comentario->setArticulo($articulo);

                $em = $this->getDoctrine()->getManager();
                $em->persist($comentario);
                $em->flush();

                /*$message = \Swift_Message::newInstance()
                    ->setSubject('Raloy Lubricantes WebPage - Contacto')
                    ->setFrom($data['email'])
                    //->setFrom(array('info@raloylubricantes.mx'))
                    ->setTo(array('informacion@raloy.com.mx'))
                    //->setTo(array('cesar@innology.mx'))
                    ->setBody(
                        $this->renderView('@Frontend/mail/contact.html.twig',array('contacto'=>$data,'paises'=>$country)),
                        'text/html'
                    )
                ;
                $this->get('mailer')->send($message);*/
                $enviado=1;
            }else{
                $enviado=0;
            }
        }else{
            $enviado=0;
        }

        $sugerencias=null;
        $repository = $this->getDoctrine()->getRepository('CoreBundle:Articulo');
        $query = $repository->createQueryBuilder('s')
            ->where('s.activo = :act')
            ->andwhere('s.slug != :slug')
            ->orderby('s.updated_at','DESC')
            ->setParameter('act', '1')
            ->setParameter('slug', $slug)
            ->getQuery();
        $sugerencias = $query->getResult();
        $comentarios = $em->getRepository('CoreBundle:Comentarios')->findBy(array('activo'=>1,'articulo'=>$articulo),array('created_at'=>'DESC'));
        return $this->render('FrontendBundle:Default:article.html.twig',array(
            'articulo'=>$articulo,
            'sugerencias'=>$sugerencias,
            'form'=>$form->createView(),
            'comentarios'=>$comentarios,
            'enviado'=>$enviado,
            'img'=>$img[0]));
    }

    /**
     * @Route("/course/{slug}", name="course")
     */
    public function courseAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $marquee = $em->getRepository('CoreBundle:Marquees')->findBy(array('activo'=>1,'tipo'=>5),array('id'=>'ASC'));
        return $this->render('FrontendBundle:Default:course.html.twig',array('marquee'=>$marquee));
    }

    /**
     * @Route("/modalDB", name="modalDB")
     */
    public function modalDBAction(Request $request){
        $data = $request->request->all();
        $em = $this->getDoctrine()->getManager();
        $modal = $em->getRepository('CoreBundle:Modals')->findOneBy(array('id'=>$data['id'],'activo'=>1));
        $response = array(
            'titulo'=>$modal->getTitulo(),
            'descripcion'=>$modal->getDescripcion(),
            'imagen'=>$modal->getImagen(),
        );
        return new JsonResponse($response);
    }
}
