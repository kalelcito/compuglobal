<?php

namespace CoreBundle\Twig;

class CoreExtension extends \Twig_Extension
{
    public function getName()
    {
        return 'core_extension';
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('sino', array($this, 'sinoFilter'), array('is_safe' => array('html'))),
            new \Twig_SimpleFilter('marquee', array($this, 'marqueeFilter'), array('is_safe' => array('html'))),
            new \Twig_SimpleFilter('banner', array($this, 'bannerFilter'), array('is_safe' => array('html'))),
            new \Twig_SimpleFilter('imagenEnlace', array($this, 'imagenEnlaceFilter'), array('is_safe' => array('html'))),
            new \Twig_SimpleFilter('imagensinEnlace', array($this, 'imagensinEnlaceFilter'), array('is_safe' => array('html'))),
            new \Twig_SimpleFilter('modal', array($this, 'modalsFilter'), array('is_safe' => array('html'))),
        );
    }

    public function sinoFilter($value)
    {
        $result='';
        if($value){
            $result='<i class="fa fa-check-circle" style="color: green;" ></i>';
        }else{
            $result='<i class="fa fa-times-circle" style="color: red;" ></i>';
        }
        return $result;
    }

    public function marqueeFilter($value)
    {
        $result='';
        if($value==1){
            $result='Home';
        }elseif($value==2){
            $result='TagMarketing Home';
        }elseif ($value==3){
            $result='Capacitaciones';
        }elseif ($value==4){
            $result='Nosotros';
        }elseif ($value==5){
            $result='Cursos';
        }elseif ($value==6){
            $result='Promociones';
        }
        return $result;
    }

    public function bannerFilter($value)
    {
        $result='';
        if($value==1){
            $result='Home';
        }elseif($value==2){
            $result='Promociones';
        }elseif ($value==3){
            $result='Cursos';
        }
        return $result;
    }

    public function imagenEnlaceFilter($value)
    {
        $result='';
        if($value==1){
            $result='Seccion Enlace Chico';
        }elseif($value==2){
            $result='Seccion Enlace Grande';
        }elseif ($value==3){
            $result='TagMarketing';
        }
        return $result;
    }

    public function imagensinEnlaceFilter($value)
    {
        $result='';
        if($value==1){
            $result='Capacitaciones en Home';
        }elseif($value==2){
            $result='Nosotros';
        }elseif ($value==3){
            $result='Blog';
        }
        return $result;
    }

    public function modalsFilter($value)
    {
        $result='';
        if($value==1){
            $result='Normal';
        }elseif($value==2){
            $result='Menu Productos';
        }elseif ($value==3){
            $result='Menu Marcas';
        }elseif ($value==4){
            $result='Menu Hot Sale';
        }elseif ($value==5){
            $result='Especial - Cursos Chico';
        }elseif ($value==6){
            $result='Especial - Cursos Grande';
        }
        return $result;
    }
}
