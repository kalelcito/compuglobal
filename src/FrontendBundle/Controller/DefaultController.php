<?php

namespace FrontendBundle\Controller;

use CoreBundle\Entity\Comentarios;
use CoreBundle\Entity\Contacto;
use CoreBundle\Entity\Inscripciones;
use CoreBundle\Entity\Pedidos;
use FrontendBundle\Form\ComentarioType;
use FrontendBundle\Form\ContactoType;
use FrontendBundle\Form\InscripcionType;
use FrontendBundle\Form\PedidoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $id='';
        if($request->getMethod()=='POST'){
            $data = $request->request->all();
            $id = $data['ide'];
        }
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
            'capaImg'=>$capImg[0],
            'id'=>$id
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
                    ->setTo(array('compuglobal@compuglobal.com.mx','mercadotecnia@compuglobal.com.mx'))
                    //->setTo(array('cesar@innology.mx'))
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
        $today = date("Y-m-d");
        $courses=null;
        $repository = $this->getDoctrine()->getRepository('CoreBundle:Curso');
        $query = $repository->createQueryBuilder('c')
            ->where('c.activo = :act')
            ->andwhere('c.fecha >= :hoy')
            ->orderby('c.fecha','ASC')
            ->setParameter('act', '1')
            ->setParameter('hoy', $today)
            ->getQuery();
        $courses = $query->getResult();

        return $this->render('FrontendBundle:Default:courses.html.twig',array('marquee'=>$marquee,'banners'=>$banners,'chico'=>$chico,'grande'=>$grande,'cursos'=>$courses));
    }

    /**
     * @Route("/promotions", name="promotions")
     */
    public function promotionsAction(Request $request)
    {
        $form = $this->createForm(PedidoType::class,null,array(
            'method' => 'POST',
            'attr'=>array('id'=>'pedido-form')
        ));
        $em = $this->getDoctrine()->getManager();

        $enviado=0;
        $errores=array();
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $data = $form->getData();
            $encoders = array(new XmlEncoder(), new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);
            $validator = $this->get('validator');

            $cliente = $serializer->deserialize(json_encode($data), Pedidos::class, 'json');

            $errors = $validator->validate($cliente);
            if ($form->isValid() && count($errors) == 0) {
                $producto = $em->getRepository('CoreBundle:Productos')->findOneBy(array('sku' => $data['sku']));
                $pedido = new Pedidos();
                $pedido->setNombre($data['nombre']);
                $pedido->setEmail($data['email']);
                $pedido->setTelefono($data['telefono']);
                $pedido->setCantidad($data['cantidad']);
                $pedido->setProductos($producto);
                $total = $producto->getPrecio() * $data['cantidad'];
                $pedido->setTotal($total);
                $pedido->setStatus(1);

                $em = $this->getDoctrine()->getManager();
                $em->persist($pedido);
                $em->flush();

                $message = \Swift_Message::newInstance()
                    ->setSubject('Pedido - WebPage Compuglobal')
                    ->setFrom($data['email'])
                    ->setTo(array('compuglobal@compuglobal.com.mx','mercadotecnia@compuglobal.com.mx'))
                    //->setTo(array('cesar@innology.mx'))
                    ->setBody(
                        $this->renderView('@Frontend/mail/pedido.html.twig',array('contacto'=>$data,'producto'=>$producto,'total'=>$total)),
                        'text/html'
                    )
                ;
                $this->get('mailer')->send($message);
                $enviado = 1;
            } else {
                $enviado = 0;
                foreach ($errors as $key => $error) {
                    $errores[] = array('campo' => $error->getpropertyPath(), 'mensaje' => $error->getMessage());
                }
            }
            $status = array('status' => $enviado, 'errores' => $errores);
            return new JsonResponse($status);
        }

        $marquee = $em->getRepository('CoreBundle:Marquees')->findBy(array('activo'=>1,'tipo'=>6),array('id'=>'ASC'));
        $banners = $em->getRepository('CoreBundle:Banners')->findBy(array('activo'=>1,'tipo'=>2),array('orden'=>'ASC'));
        $categorias = $em->getRepository('CoreBundle:Categoria')->findBy(array('activo'=>1,'tipo'=>1),array('id'=>'ASC'),4);
        $black = $em->getRepository('CoreBundle:Categoria')->findBy(array('activo'=>1,'tipo'=>2),array('updated_at'=>'ASC'));
        $prod1 = $em->getRepository('CoreBundle:Productos')->findBy(array('activo'=>1,'categoria'=>$categorias[0]),array('updated_at'=>'DESC'));
        $prod2 = $em->getRepository('CoreBundle:Productos')->findBy(array('activo'=>1,'categoria'=>$categorias[1]),array('updated_at'=>'DESC'));
        $prod3 = $em->getRepository('CoreBundle:Productos')->findBy(array('activo'=>1,'categoria'=>$categorias[2]),array('updated_at'=>'DESC'));
        $prod4 = $em->getRepository('CoreBundle:Productos')->findBy(array('activo'=>1,'categoria'=>$categorias[3]),array('updated_at'=>'DESC'));
        $blackprod = $em->getRepository('CoreBundle:Productos')->findBy(array('activo'=>1,'categoria'=>$black[0]),array('updated_at'=>'DESC'));
        return $this->render('FrontendBundle:Default:promotions.html.twig',array(
            'marquee'=>$marquee,
            'banners'=>$banners,
            'categorias'=>$categorias,
            'black'=>$black,
            'prod1'=>$prod1,
            'prod2'=>$prod2,
            'prod3'=>$prod3,
            'prod4'=>$prod4,
            'blackprod'=>$blackprod,
            'form'=>$form->createView()
        ));
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
    public function courseAction($slug,Request $request)
    {
        $form = $this->createForm(InscripcionType::class,null,array(
            'method' => 'POST',
            'attr'=>array('id'=>'inscripcion-form')
        ));

        $em = $this->getDoctrine()->getManager();
        $marquee = $em->getRepository('CoreBundle:Marquees')->findBy(array('activo'=>1,'tipo'=>5),array('id'=>'ASC'));
        $curso = $em->getRepository('CoreBundle:Curso')->findOneBy(array('activo'=>1,'slug'=>$slug));

        $enviado=0;
        $errores=array();
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $data = $form->getData();
            $encoders = array(new XmlEncoder(), new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);
            $validator = $this->get('validator');

            $cliente = $serializer->deserialize(json_encode($data), Inscripciones::class, 'json');

            $errors = $validator->validate($cliente);
            if($form->isValid() && count($errors)==0){

                $buscar = $em->getRepository('CoreBundle:Inscripciones')->findBy(array('email'=>$data['email'],'curso'=>$curso));
                $buscar2 = $em->getRepository('CoreBundle:Inscripciones')->findBy(array('telefono'=>$data['telefono'],'curso'=>$curso));
                if(!$buscar && !$buscar2){
                    $inscripcion = new Inscripciones();
                    $inscripcion->setNombre($data['nombre']);
                    $inscripcion->setEmail($data['email']);
                    $inscripcion->setTelefono($data['telefono']);
                    $inscripcion->setCurso($curso);
                    $inscripcion->setActivo(1);

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($inscripcion);
                    $em->flush();

                    $message = \Swift_Message::newInstance()
                        ->setSubject('Inscripción a Curso - WebPage Compuglobal')
                        ->setFrom($data['email'])
                        ->setTo(array('compuglobal@compuglobal.com.mx','mercadotecnia@compuglobal.com.mx'))
                        //->setTo(array('cesar@innology.mx'))
                        ->setBody(
                            $this->renderView('@Frontend/mail/inscripcion.html.twig',array('contacto'=>$data,'curso'=>$curso->getTitulo())),
                            'text/html'
                        )
                    ;
                    $this->get('mailer')->send($message);
                    $enviado=1;
                }else{
                    $enviado=2;
                }
            }else{
                $enviado=0;
                    foreach ($errors as $key=>$error) {
                        $errores[]=array('campo'=>$error->getpropertyPath(),'mensaje'=> $error->getMessage());
                    }
            }
            $status = array('status'=>$enviado,'errores'=>$errores);
            return new JsonResponse($status);
        }else{
            $enviado=0;
        }

        return $this->render('FrontendBundle:Default:course.html.twig',array('marquee'=>$marquee,'curso'=>$curso,'form'=>$form->createView()));
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

    /**
     * @Route("/sku", name="skuDB")
     */
    public function skuDBAction(Request $request){
        $data = $request->request->all();
        $em = $this->getDoctrine()->getManager();
        $modal = $em->getRepository('CoreBundle:Productos')->findOneBy(array('sku'=>$data['sku'],'activo'=>1));
        $response = array(
            'titulo'=>$modal->getTitulo(),
            'descripcion'=>$modal->getDescripcion(),
            'precio'=>$modal->getPrecio(),
            'sku'=>$modal->getSku()
        );
        return new JsonResponse($response);
    }
}
