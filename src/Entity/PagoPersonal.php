<?php

namespace App\Entity;

use App\Repository\PagoPersonalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PagoPersonalRepository::class)
 */
class PagoPersonal
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=CuentaCredito::class, inversedBy="pagoPersonals")
     */
    private $cuenta_credito_id;

    /**
     * @ORM\ManyToOne(targetEntity=PersonalPago::class, inversedBy="pagoPersonals")
     */
    private $personal_pago_id;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $importe;

    /**
     * @ORM\Column(type="text")
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

    public function getCuentaCreditoId(): ?CuentaCredito
    {
        return $this->cuenta_credito_id;
    }

    public function setCuentaCreditoId(?CuentaCredito $cuenta_credito_id): self
    {
        $this->cuenta_credito_id = $cuenta_credito_id;

        return $this;
    }

    public function getPersonalPagoId(): ?PersonalPago
    {
        return $this->personal_pago_id;
    }

    public function setPersonalPagoId(?PersonalPago $personal_pago_id): self
    {
        $this->personal_pago_id = $personal_pago_id;

        return $this;
    }

    public function getImporte(): ?string
    {
        return $this->importe;
    }

    public function setImporte(string $importe): self
    {
        $this->importe = $importe;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
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
