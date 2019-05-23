<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\IncidenciaRepository")
 */
class Incidencia
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titulo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Descripcion;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $FechaCreacion;


    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @var string A "Y-m-d" formatted value
     */
    private $Resuelta;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $FechaResolucion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category")
     */
    private $categoria;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag", mappedBy="incidencia")
     */
    private $tags;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $codigo;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $adjunto;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Comercial;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->Titulo;
    }

    public function setTitulo(string $Titulo): self
    {
        $this->Titulo = $Titulo;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->Descripcion;
    }

    public function setDescripcion(?string $Descripcion): self
    {
        $this->Descripcion = $Descripcion;

        return $this;
    }

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->FechaCreacion;
    }

    public function setFechaCreacion(?\DateTimeInterface $FechaCreacion = null): self
    {
        $this->FechaCreacion = $FechaCreacion;

        return $this;
    }

    public function getResuelta(): ?bool
    {
        return $this->Resuelta;
    }

    public function setResuelta(bool $Resuelta): self
    {
        $this->Resuelta = $Resuelta;

        return $this;
    }

    public function getFechaResolucion(): ?\DateTimeInterface
    {
        return $this->FechaResolucion;
    }

    public function setFechaResolucion(?\DateTimeInterface $FechaResolucion): self
    {
        $this->FechaCreacion = $FechaResolucion;

        return $this;
    }

    public function getCategoria(): ?Category
    {
        return $this->categoria;
    }

    public function setCategoria(?Category $categoria=null): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addIncidencium($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
            $tag->removeIncidencium($this);
        }

        return $this;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getAdjunto()
    {
        return $this->adjunto;
    }

    public function setAdjunto($adjunto)
    {
        $this->adjunto = $adjunto;

        return $this;
    }

    public function getComercial(): ?int
    {
        return $this->Comercial;
    }

    public function setComercial(?int $Comercial): self
    {
        $this->Comercial = $Comercial;

        return $this;
    }
}