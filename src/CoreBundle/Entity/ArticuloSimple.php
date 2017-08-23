<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CoreBundle\Entity\ArticuloSimple
 *
 * @ORM\Entity()
 * @ORM\Table(name="articulo_simple", indexes={@ORM\Index(name="fk_articulo_simple_modals_idx", columns={"modals_id"})})
 */
class ArticuloSimple
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Assert\File(mimeTypes={ "image/jpg" , "image/jpeg" , "image/gif" ,
     * "image/png" })
     *
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    protected $imagen;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $titulo;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $subtitulo;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $activo;

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
     * @ORM\ManyToOne(targetEntity="Modals", inversedBy="articuloSimples")
     * @ORM\JoinColumn(name="modals_id", referencedColumnName="id", nullable=false)
     */
    protected $modals;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\ArticuloSimple
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
     * Set the value of imagen.
     *
     * @param string $imagen
     * @return \CoreBundle\Entity\ArticuloSimple
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
     * Set the value of titulo.
     *
     * @param string $titulo
     * @return \CoreBundle\Entity\ArticuloSimple
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
     * Set the value of subtitulo.
     *
     * @param string $subtitulo
     * @return \CoreBundle\Entity\ArticuloSimple
     */
    public function setSubtitulo($subtitulo)
    {
        $this->subtitulo = $subtitulo;

        return $this;
    }

    /**
     * Get the value of subtitulo.
     *
     * @return string
     */
    public function getSubtitulo()
    {
        return $this->subtitulo;
    }

    /**
     * Set the value of modals_id.
     *
     * @param integer $modals_id
     * @return \CoreBundle\Entity\ArticuloSimple
     */
    public function setModalsId($modals_id)
    {
        $this->modals_id = $modals_id;

        return $this;
    }

    /**
     * Get the value of modals_id.
     *
     * @return integer
     */
    public function getModalsId()
    {
        return $this->modals_id;
    }

    /**
     * Set the value of activo.
     *
     * @param boolean $activo
     * @return \CoreBundle\Entity\ArticuloSimple
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
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\ArticuloSimple
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
     * @return \CoreBundle\Entity\ArticuloSimple
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
     * Set Modals entity (many to one).
     *
     * @param \CoreBundle\Entity\Modals $modals
     * @return \CoreBundle\Entity\ArticuloSimple
     */
    public function setModals(Modals $modals = null)
    {
        $this->modals = $modals;

        return $this;
    }

    /**
     * Get Modals entity (many to one).
     *
     * @return \CoreBundle\Entity\Modals
     */
    public function getModals()
    {
        return $this->modals;
    }

    public function __sleep()
    {
        return array('id', 'imagen', 'titulo', 'subtitulo', 'modals_id', 'activo', 'created_at', 'updated_at');
    }
}