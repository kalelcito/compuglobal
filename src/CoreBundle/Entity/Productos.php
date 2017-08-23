<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CoreBundle\Entity\Productos
 *
 * @ORM\Entity()
 * @ORM\Table(name="productos", indexes={@ORM\Index(name="fk_productos_categoria1_idx", columns={"categoria_id"})})
 */
class Productos
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    protected $sku;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
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
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $descripcion;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2, nullable=true)
     */
    protected $precio;

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
     * @ORM\OneToMany(targetEntity="Pedidos", mappedBy="productos")
     * @ORM\JoinColumn(name="id", referencedColumnName="productos_id", nullable=false)
     */
    protected $pedidos;

    /**
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="productos")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id", nullable=false)
     */
    protected $categoria;

    public function __construct()
    {
        $this->pedidos = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Productos
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
     * Set the value of sku.
     *
     * @param string $sku
     * @return \CoreBundle\Entity\Productos
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get the value of sku.
     *
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set the value of titulo.
     *
     * @param string $titulo
     * @return \CoreBundle\Entity\Productos
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
     * @return \CoreBundle\Entity\Productos
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
     * Set the value of descripcion.
     *
     * @param string $descripcion
     * @return \CoreBundle\Entity\Productos
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
     * Set the value of precio.
     *
     * @param float $precio
     * @return \CoreBundle\Entity\Productos
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
     * Set the value of categoria_id.
     *
     * @param integer $categoria_id
     * @return \CoreBundle\Entity\Productos
     */
    public function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;

        return $this;
    }

    /**
     * Get the value of categoria_id.
     *
     * @return integer
     */
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of activo.
     *
     * @param boolean $activo
     * @return \CoreBundle\Entity\Productos
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
     * @return \CoreBundle\Entity\Productos
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
     * @return \CoreBundle\Entity\Productos
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
     * Add Pedidos entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Pedidos $pedidos
     * @return \CoreBundle\Entity\Productos
     */
    public function addPedidos(Pedidos $pedidos)
    {
        $this->pedidos[] = $pedidos;

        return $this;
    }

    /**
     * Remove Pedidos entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Pedidos $pedidos
     * @return \CoreBundle\Entity\Productos
     */
    public function removePedidos(Pedidos $pedidos)
    {
        $this->pedidos->removeElement($pedidos);

        return $this;
    }

    /**
     * Get Pedidos entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPedidos()
    {
        return $this->pedidos;
    }

    /**
     * Set Categoria entity (many to one).
     *
     * @param \CoreBundle\Entity\Categoria $categoria
     * @return \CoreBundle\Entity\Productos
     */
    public function setCategoria(Categoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get Categoria entity (many to one).
     *
     * @return \CoreBundle\Entity\Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    public function __sleep()
    {
        return array('id', 'sku', 'titulo', 'imagen', 'descripcion', 'precio', 'categoria_id', 'activo', 'created_at', 'updated_at');
    }
}