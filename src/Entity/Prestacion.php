<?php

namespace App\Entity;

use App\Repository\PrestacionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrestacionRepository::class)
 */
class Prestacion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Proyecto::class, inversedBy="prestacions")
     */
    private $proyecto_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $monto;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $detalles;

    /**
     * @ORM\Column(type="boolean")
     */
    private $es_retenciones;

    /**
     * @ORM\Column(type="integer")
     */
    private $retenciones;

    /**
     * @ORM\Column(type="boolean")
     */
    private $es_detraccion;

    /**
     * @ORM\Column(type="integer")
     */
    private $detraccion;

    /**
     * @ORM\Column(type="integer")
     */
    private $nro_pagos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $periodicidad;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estado;

    /**
     * @ORM\OneToMany(targetEntity=Comprobante::class, mappedBy="prestacion_id")
     */
    private $comprobantes;

    public function __construct()
    {
        $this->comprobantes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProyectoId(): ?Proyecto
    {
        return $this->proyecto_id;
    }

    public function setProyectoId(?Proyecto $proyecto_id): self
    {
        $this->proyecto_id = $proyecto_id;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getMonto(): ?string
    {
        return $this->monto;
    }

    public function setMonto(string $monto): self
    {
        $this->monto = $monto;

        return $this;
    }

    public function getDetalles(): ?string
    {
        return $this->detalles;
    }

    public function setDetalles(?string $detalles): self
    {
        $this->detalles = $detalles;

        return $this;
    }

    public function getEsRetenciones(): ?bool
    {
        return $this->es_retenciones;
    }

    public function setEsRetenciones(bool $es_retenciones): self
    {
        $this->es_retenciones = $es_retenciones;

        return $this;
    }

    public function getRetenciones(): ?int
    {
        return $this->retenciones;
    }

    public function setRetenciones(int $retenciones): self
    {
        $this->retenciones = $retenciones;

        return $this;
    }

    public function getEsDetraccion(): ?bool
    {
        return $this->es_detraccion;
    }

    public function setEsDetraccion(bool $es_detraccion): self
    {
        $this->es_detraccion = $es_detraccion;

        return $this;
    }

    public function getDetraccion(): ?int
    {
        return $this->detraccion;
    }

    public function setDetraccion(int $detraccion): self
    {
        $this->detraccion = $detraccion;

        return $this;
    }

    public function getNroPagos(): ?int
    {
        return $this->nro_pagos;
    }

    public function setNroPagos(int $nro_pagos): self
    {
        $this->nro_pagos = $nro_pagos;

        return $this;
    }

    public function getPeriodicidad(): ?string
    {
        return $this->periodicidad;
    }

    public function setPeriodicidad(string $periodicidad): self
    {
        $this->periodicidad = $periodicidad;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getEstado(): ?bool
    {
        return $this->estado;
    }

    public function setEstado(bool $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return Collection|Comprobante[]
     */
    public function getComprobantes(): Collection
    {
        return $this->comprobantes;
    }

    public function addComprobante(Comprobante $comprobante): self
    {
        if (!$this->comprobantes->contains($comprobante)) {
            $this->comprobantes[] = $comprobante;
            $comprobante->setPrestacionId($this);
        }

        return $this;
    }

    public function removeComprobante(Comprobante $comprobante): self
    {
        if ($this->comprobantes->contains($comprobante)) {
            $this->comprobantes->removeElement($comprobante);
            // set the owning side to null (unless already changed)
            if ($comprobante->getPrestacionId() === $this) {
                $comprobante->setPrestacionId(null);
            }
        }

        return $this;
    }
}
