<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CoreBundle\Entity\Curso
 *
 * @ORM\Entity()
 * @ORM\Table(name="curso")
 */
class Curso
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $fecha;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $titulo;

    /**
     * @Assert\File(mimeTypes={ "image/jpg" , "image/jpeg" , "image/gif" ,
     * "image/png" })
     *
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    protected $imagen;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2, nullable=true)
     */
    protected $precio;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $contenido;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $color_fondo;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $color_titulo;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $color_fecha;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $activo;

    /**
     * @Gedmo\Slug(separator="-", updatable=true, fields={"titulo"})
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $slug;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $metakeys;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    protected $metadesc;

    /**
     * @Gedmo\Timestampable(on="create", field="creado")
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $created_at;

    /**
     * @Gedmo\Timestampable(on="update", field="actualizado")
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated_at;

    /**
     * @ORM\OneToMany(targetEntity="Inscripciones", mappedBy="curso")
     * @ORM\JoinColumn(name="id", referencedColumnName="curso_id", nullable=false)
     */
    protected $inscripciones;

    public function __construct()
    {
        $this->inscripciones = new ArrayCollection();
    }

    public function __toString() {
        return $this->titulo;
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Curso
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of fecha.
     *
     * @param \DateTime $fecha
     * @return \CoreBundle\Entity\Curso
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of fecha.
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of titulo.
     *
     * @param string $titulo
     * @return \CoreBundle\Entity\Curso
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of titulo.
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of imagen.
     *
     * @param string $imagen
     * @return \CoreBundle\Entity\Curso
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of imagen.
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of precio.
     *
     * @param float $precio
     * @return \CoreBundle\Entity\Curso
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of precio.
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of contenido.
     *
     * @param string $contenido
     * @return \CoreBundle\Entity\Curso
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get the value of contenido.
     *
     * @return string
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set the value of color_fondo.
     *
     * @param string $color_fondo
     * @return \CoreBundle\Entity\Curso
     */
    public function setColorFondo($color_fondo)
    {
        $this->color_fondo = $color_fondo;

        return $this;
    }

    /**
     * Get the value of color_fondo.
     *
     * @return string
     */
    public function getColorFondo()
    {
        return $this->color_fondo;
    }

    /**
     * Set the value of color_titulo.
     *
     * @param string $color_titulo
     * @return \CoreBundle\Entity\Curso
     */
    public function setColorTitulo($color_titulo)
    {
        $this->color_titulo = $color_titulo;

        return $this;
    }

    /**
     * Get the value of color_titulo.
     *
     * @return string
     */
    public function getColorTitulo()
    {
        return $this->color_titulo;
    }

    /**
     * Set the value of color_fecha.
     *
     * @param string $color_fecha
     * @return \CoreBundle\Entity\Curso
     */
    public function setColorFecha($color_fecha)
    {
        $this->color_fecha = $color_fecha;

        return $this;
    }

    /**
     * Get the value of color_fecha.
     *
     * @return string
     */
    public function getColorFecha()
    {
        return $this->color_fecha;
    }

    /**
     * Set the value of activo.
     *
     * @param boolean $activo
     * @return \CoreBundle\Entity\Curso
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get the value of activo.
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set the value of slug.
     *
     * @param string $slug
     * @return \CoreBundle\Entity\Curso
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get the value of slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of metakeys.
     *
     * @param string $metakeys
     * @return \CoreBundle\Entity\Curso
     */
    public function setMetakeys($metakeys)
    {
        $this->metakeys = $metakeys;

        return $this;
    }

    /**
     * Get the value of metakeys.
     *
     * @return string
     */
    public function getMetakeys()
    {
        return $this->metakeys;
    }

    /**
     * Set the value of metadesc.
     *
     * @param string $metadesc
     * @return \CoreBundle\Entity\Curso
     */
    public function setMetadesc($metadesc)
    {
        $this->metadesc = $metadesc;

        return $this;
    }

    /**
     * Get the value of metadesc.
     *
     * @return string
     */
    public function getMetadesc()
    {
        return $this->metadesc;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\Curso
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of created_at.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of updated_at.
     *
     * @param \DateTime $updated_at
     * @return \CoreBundle\Entity\Curso
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of updated_at.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add Inscripciones entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Inscripciones $inscripciones
     * @return \CoreBundle\Entity\Curso
     */
    public function addInscripciones(Inscripciones $inscripciones)
    {
        $this->inscripciones[] = $inscripciones;

        return $this;
    }

    /**
     * Remove Inscripciones entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Inscripciones $inscripciones
     * @return \CoreBundle\Entity\Curso
     */
    public function removeInscripciones(Inscripciones $inscripciones)
    {
        $this->inscripciones->removeElement($inscripciones);

        return $this;
    }

    /**
     * Get Inscripciones entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInscripciones()
    {
        return $this->inscripciones;
    }

    public function __sleep()
    {
        return array('id', 'fecha', 'titulo', 'imagen', 'precio', 'contenido', 'color_fondo', 'color_titulo', 'color_fecha', 'activo', 'slug', 'metakeys', 'metadesc', 'created_at', 'updated_at');
    }
}