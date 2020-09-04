<?php

namespace App\Entity;

use App\Repository\OrdenCompraRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdenCompraRepository::class)
 */
class OrdenCompra
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class, inversedBy="ordenCompras")
     */
    private $cliente_id;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="ordenCompras")
     */
    private $empresa_id;

    /**
     * @ORM\ManyToOne(targetEntity=FormaPago::class, inversedBy="ordenCompras")
     */
    private $forma_pago_id;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_emision;

    /**
     * @ORM\Column(type="integer")
     */
    private $tiempo_validez;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $condicion;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $serie;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $moneda;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $aplica_igv;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $sub_total;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $descuentos;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $base_imponible;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $igv;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $total;

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

    /**
     * @ORM\OneToMany(targetEntity=OrdenProducto::class, mappedBy="orden_compra_id")
     */
    private $ordenProductos;

    public function __construct()
    {
        $this->ordenProductos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClienteId(): ?Cliente
    {
        return $this->cliente_id;
    }

    public function setClienteId(?Cliente $cliente_id): self
    {
        $this->cliente_id = $cliente_id;

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

    public function getFormaPagoId(): ?FormaPago
    {
        return $this->forma_pago_id;
    }

    public function setFormaPagoId(?FormaPago $forma_pago_id): self
    {
        $this->forma_pago_id = $forma_pago_id;

        return $this;
    }

    public function getFechaEmision(): ?\DateTimeInterface
    {
        return $this->fecha_emision;
    }

    public function setFechaEmision(\DateTimeInterface $fecha_emision): self
    {
        $this->fecha_emision = $fecha_emision;

        return $this;
    }

    public function getTiempoValidez(): ?int
    {
        return $this->tiempo_validez;
    }

    public function setTiempoValidez(int $tiempo_validez): self
    {
        $this->tiempo_validez = $tiempo_validez;

        return $this;
    }

    public function getCondicion(): ?string
    {
        return $this->condicion;
    }

    public function setCondicion(string $condicion): self
    {
        $this->condicion = $condicion;

        return $this;
    }

    public function getSerie(): ?string
    {
        return $this->serie;
    }

    public function setSerie(string $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getMoneda(): ?string
    {
        return $this->moneda;
    }

    public function setMoneda(string $moneda): self
    {
        $this->moneda = $moneda;

        return $this;
    }

    public function getAplicaIgv(): ?string
    {
        return $this->aplica_igv;
    }

    public function setAplicaIgv(string $aplica_igv): self
    {
        $this->aplica_igv = $aplica_igv;

        return $this;
    }

    public function getSubTotal(): ?string
    {
        return $this->sub_total;
    }

    public function setSubTotal(string $sub_total): self
    {
        $this->sub_total = $sub_total;

        return $this;
    }

    public function getDescuentos(): ?string
    {
        return $this->descuentos;
    }

    public function setDescuentos(string $descuentos): self
    {
        $this->descuentos = $descuentos;

        return $this;
    }

    public function getBaseImponible(): ?string
    {
        return $this->base_imponible;
    }

    public function setBaseImponible(string $base_imponible): self
    {
        $this->base_imponible = $base_imponible;

        return $this;
    }

    public function getIgv(): ?string
    {
        return $this->igv;
    }

    public function setIgv(string $igv): self
    {
        $this->igv = $igv;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
    {
        $this->total = $total;

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

    /**
     * @return Collection|OrdenProducto[]
     */
    public function getOrdenProductos(): Collection
    {
        return $this->ordenProductos;
    }

    public function addOrdenProducto(OrdenProducto $ordenProducto): self
    {
        if (!$this->ordenProductos->contains($ordenProducto)) {
            $this->ordenProductos[] = $ordenProducto;
            $ordenProducto->setOrdenCompraId($this);
        }

        return $this;
    }

    public function removeOrdenProducto(OrdenProducto $ordenProducto): self
    {
        if ($this->ordenProductos->contains($ordenProducto)) {
            $this->ordenProductos->removeElement($ordenProducto);
            // set the owning side to null (unless already changed)
            if ($ordenProducto->getOrdenCompraId() === $this) {
                $ordenProducto->setOrdenCompraId(null);
            }
        }

        return $this;
    }
}
