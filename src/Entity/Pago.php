<?php

namespace App\Entity;

use App\Repository\PagoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PagoRepository::class)
 */
class Pago
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Comprobante::class, inversedBy="pagos")
     */
    private $comprobante_id;

    /**
     * @ORM\ManyToOne(targetEntity=CuentaCredito::class, inversedBy="pagos")
     */
    private $cuenta_credito_id;

    /**
     * @ORM\ManyToOne(targetEntity=FormaPago::class, inversedBy="pagos")
     */
    private $forma_pago_id;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="pagos")
     */
    private $empresa_id;

    /**
     * @ORM\ManyToOne(targetEntity=CajaChica::class, inversedBy="pagos")
     */
    private $caja_chica_id;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="pagos")
     */
    private $usuario_id;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tipo;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $monto;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $nro_transaccion;

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

    public function getComprobanteId(): ?Comprobante
    {
        return $this->comprobante_id;
    }

    public function setComprobanteId(?Comprobante $comprobante_id): self
    {
        $this->comprobante_id = $comprobante_id;

        return $this;
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

    public function getFormaPagoId(): ?FormaPago
    {
        return $this->forma_pago_id;
    }

    public function setFormaPagoId(?FormaPago $forma_pago_id): self
    {
        $this->forma_pago_id = $forma_pago_id;

        return $this;
    }

    public function getEmpresaId(): ?Empresa
    {
        return $this->empresa_id;
    }

    public function setEmpresaId(?Empresa $empresa_id): self
    {
        $this->empresa_id = $empresa_id;

        return $this;
    }

    public function getCajaChicaId(): ?CajaChica
    {
        return $this->caja_chica_id;
    }

    public function setCajaChicaId(?CajaChica $caja_chica_id): self
    {
        $this->caja_chica_id = $caja_chica_id;

        return $this;
    }

    public function getUsuarioId(): ?Usuario
    {
        return $this->usuario_id;
    }

    public function setUsuarioId(?Usuario $usuario_id): self
    {
        $this->usuario_id = $usuario_id;

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

    public function getTipo(): ?int
    {
        return $this->tipo;
    }

    public function setTipo(?int $tipo): self
    {
        $this->tipo = $tipo;

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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getNroTransaccion(): ?string
    {
        return $this->nro_transaccion;
    }

    public function setNroTransaccion(?string $nro_transaccion): self
    {
        $this->nro_transaccion = $nro_transaccion;

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
