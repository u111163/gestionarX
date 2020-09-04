<?php

namespace App\Entity;

use App\Repository\VinculoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VinculoRepository::class)
 */
class Vinculo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Comprobante::class, inversedBy="principal_vinculos")
     */
    private $comprobante_principal_id;

    /**
     * @ORM\ManyToOne(targetEntity=Comprobante::class, inversedBy="secundario_vinculos")
     */
    private $comprobante_secundario_id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estado;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComprobantePrincipalId(): ?Comprobante
    {
        return $this->comprobante_principal_id;
    }

    public function setComprobantePrincipalId(?Comprobante $comprobante_principal_id): self
    {
        $this->comprobante_principal_id = $comprobante_principal_id;

        return $this;
    }

    public function getComprobanteSecundarioId(): ?Comprobante
    {
        return $this->comprobante_secundario_id;
    }

    public function setComprobanteSecundarioId(?Comprobante $comprobante_secundario_id): self
    {
        $this->comprobante_secundario_id = $comprobante_secundario_id;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

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
}
