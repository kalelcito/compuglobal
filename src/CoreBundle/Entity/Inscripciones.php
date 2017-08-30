<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CoreBundle\Entity\Inscripciones
 *
 * @ORM\Entity()
 * @ORM\Table(name="inscripciones", indexes={@ORM\Index(name="fk_inscripciones_curso1_idx", columns={"curso_id"})})
 */
class Inscripciones
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\Length(min="4",minMessage="Tu nombre debe ser mayor a {{ limit }} caracteres")
     * @Assert\NotBlank(message="Ingresa un Nombre")
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Email(message="El correo electronico {{ value }} no es valido")
     * @Assert\NotBlank(message="Ingresa un email")
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     * @Assert\Length(min="7",minMessage="Ingresa un telefono de al menos {{ limit }} digitos")
     * @Assert\NotBlank(message="Ingresa un telefono")
     */
    protected $telefono;

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
     * @ORM\ManyToOne(targetEntity="Curso", inversedBy="inscripciones")
     * @ORM\JoinColumn(name="curso_id", referencedColumnName="id", nullable=false)
     */
    protected $curso;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Inscripciones
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
     * Set the value of nombre.
     *
     * @param string $nombre
     * @return \CoreBundle\Entity\Inscripciones
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of email.
     *
     * @param string $email
     * @return \CoreBundle\Entity\Inscripciones
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of telefono.
     *
     * @param string $telefono
     * @return \CoreBundle\Entity\Inscripciones
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of telefono.
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of curso_id.
     *
     * @param integer $curso_id
     * @return \CoreBundle\Entity\Inscripciones
     */
    public function setCursoId($curso_id)
    {
        $this->curso_id = $curso_id;

        return $this;
    }

    /**
     * Get the value of curso_id.
     *
     * @return integer
     */
    public function getCursoId()
    {
        return $this->curso_id;
    }

    /**
     * Set the value of activo.
     *
     * @param boolean $activo
     * @return \CoreBundle\Entity\Inscripciones
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
     * @return \CoreBundle\Entity\Inscripciones
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
     * @return \CoreBundle\Entity\Inscripciones
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
     * Set Curso entity (many to one).
     *
     * @param \CoreBundle\Entity\Curso $curso
     * @return \CoreBundle\Entity\Inscripciones
     */
    public function setCurso(Curso $curso = null)
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get Curso entity (many to one).
     *
     * @return \CoreBundle\Entity\Curso
     */
    public function getCurso()
    {
        return $this->curso;
    }

    public function __sleep()
    {
        return array('id', 'nombre', 'email', 'telefono', 'curso_id', 'activo', 'created_at', 'updated_at');
    }
}