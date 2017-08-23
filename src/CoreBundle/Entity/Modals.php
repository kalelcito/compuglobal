<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CoreBundle\Entity\Modals
 *
 * @ORM\Entity()
 * @ORM\Table(name="modals")
 */
class Modals
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $tipo;

    /**
     * @Assert\File(mimeTypes={ "image/jpg" , "image/jpeg" , "image/gif" ,
     * "image/png" })
     *
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    protected $imagen;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $titulo;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $descripcion;

    /**
     * @ORM\Column(type="string", length=35, nullable=true)
     */
    protected $texto_alternativo;

    /**
     * @Assert\File(mimeTypes={ "image/jpg" , "image/jpeg" , "image/gif" ,
     * "image/png" })
     *
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    protected $imagen_alternativa;

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
     * @ORM\OneToMany(targetEntity="ArticuloSimple", mappedBy="modals")
     * @ORM\JoinColumn(name="id", referencedColumnName="modals_id", nullable=false)
     */
    protected $articuloSimples;

    public function __construct()
    {
        $this->articuloSimples = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Modals
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
     * Set the value of tipo.
     *
     * @param integer $tipo
     * @return \CoreBundle\Entity\Modals
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of tipo.
     *
     * @return integer
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of imagen.
     *
     * @param string $imagen
     * @return \CoreBundle\Entity\Modals
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
     * @return \CoreBundle\Entity\Modals
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
     * Set the value of descripcion.
     *
     * @param string $descripcion
     * @return \CoreBundle\Entity\Modals
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of descripcion.
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of texto_alternativo.
     *
     * @param string $texto_alternativo
     * @return \CoreBundle\Entity\Modals
     */
    public function setTextoAlternativo($texto_alternativo)
    {
        $this->texto_alternativo = $texto_alternativo;

        return $this;
    }

    /**
     * Get the value of texto_alternativo.
     *
     * @return string
     */
    public function getTextoAlternativo()
    {
        return $this->texto_alternativo;
    }

    /**
     * Set the value of imagen_alternativa.
     *
     * @param string $imagen_alternativa
     * @return \CoreBundle\Entity\Modals
     */
    public function setImagenAlternativa($imagen_alternativa)
    {
        $this->imagen_alternativa = $imagen_alternativa;

        return $this;
    }

    /**
     * Get the value of imagen_alternativa.
     *
     * @return string
     */
    public function getImagenAlternativa()
    {
        return $this->imagen_alternativa;
    }

    /**
     * Set the value of activo.
     *
     * @param boolean $activo
     * @return \CoreBundle\Entity\Modals
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
     * @return \CoreBundle\Entity\Modals
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
     * @return \CoreBundle\Entity\Modals
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
     * Add ArticuloSimple entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\ArticuloSimple $articuloSimple
     * @return \CoreBundle\Entity\Modals
     */
    public function addArticuloSimple(ArticuloSimple $articuloSimple)
    {
        $this->articuloSimples[] = $articuloSimple;

        return $this;
    }

    /**
     * Remove ArticuloSimple entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\ArticuloSimple $articuloSimple
     * @return \CoreBundle\Entity\Modals
     */
    public function removeArticuloSimple(ArticuloSimple $articuloSimple)
    {
        $this->articuloSimples->removeElement($articuloSimple);

        return $this;
    }

    /**
     * Get ArticuloSimple entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticuloSimples()
    {
        return $this->articuloSimples;
    }

    public function __sleep()
    {
        return array('id', 'tipo', 'imagen', 'titulo', 'descripcion', 'texto_alternativo', 'imagen_alternativa', 'activo', 'created_at', 'updated_at');
    }
}