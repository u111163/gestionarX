<?php

namespace App\Entity;

use App\Repository\ComprobanteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComprobanteRepository::class)
 */
class Comprobante
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class, inversedBy="comprobantes")
     */
    private $cliente_id;

    /**
     * @ORM\ManyToOne(targetEntity=TipoCambio::class, inversedBy="comprobantes")
     */
    private $tipo_cambio_id;

    /**
     * @ORM\ManyToOne(targetEntity=TipoComprobante::class, inversedBy="comprobantes")
     */
    private $tipo_comprobante_id;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="comprobantes")
     */
    private $empresa_id;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="comprobantes")
     */
    private $usuario_id;

    /**
     * @ORM\ManyToOne(targetEntity=Registro::class, inversedBy="comprobantes")
     */
    private $registro_id;

    /**
     * @ORM\ManyToOne(targetEntity=Proyecto::class, inversedBy="comprobantes")
     */
    private $proyecto_id;

    /**
     * @ORM\ManyToOne(targetEntity=Prestacion::class, inversedBy="comprobantes")
     */
    private $prestacion_id;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_emision;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $vencimiento;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_vencimiento;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_registro;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $tipo_nota_credito;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $tipo_nota_debito;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $serie;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $correlativo;

    /**
     * @ORM\Column(type="text")
     */
    private $concepto;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $moneda;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $importe;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $base;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $aplica_igv;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $igv;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $total;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $servicio;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $servicios;

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
     * @ORM\OneToMany(targetEntity=Vinculo::class, mappedBy="comprobante_principal_id")
     */
    private $principal_vinculos;

    /**
     * @ORM\OneToMany(targetEntity=Vinculo::class, mappedBy="comprobante_secundario_id")
     */
    private $secundario_vinculos;

    /**
     * @ORM\OneToMany(targetEntity=Pago::class, mappedBy="comprobante_id")
     */
    private $pagos;

    public function __construct()
    {
        $this->principal_vinculos = new ArrayCollection();
        $this->secundario_vinculos = new ArrayCollection();
        $this->pagos = new ArrayCollection();
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

    public function getTipoCambioId(): ?TipoCambio
    {
        return $this->tipo_cambio_id;
    }

    public function setTipoCambioId(?TipoCambio $tipo_cambio_id): self
    {
        $this->tipo_cambio_id = $tipo_cambio_id;

        return $this;
    }

    public function getTipoComprobanteId(): ?TipoComprobante
    {
        return $this->tipo_comprobante_id;
    }

    public function setTipoComprobanteId(?TipoComprobante $tipo_comprobante_id): self
    {
        $this->tipo_comprobante_id = $tipo_comprobante_id;

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

    public function getUsuarioId(): ?Usuario
    {
        return $this->usuario_id;
    }

    public function setUsuarioId(?Usuario $usuario_id): self
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    public function getRegistroId(): ?Registro
    {
        return $this->registro_id;
    }

    public function setRegistroId(?Registro $registro_id): self
    {
        $this->registro_id = $registro_id;

        return $this;
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

    public function getPrestacionId(): ?Prestacion
    {
        return $this->prestacion_id;
    }

    public function setPrestacionId(?Prestacion $prestacion_id): self
    {
        $this->prestacion_id = $prestacion_id;

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

    public function getVencimiento(): ?string
    {
        return $this->vencimiento;
    }

    public function setVencimiento(string $vencimiento): self
    {
        $this->vencimiento = $vencimiento;

        return $this;
    }

    public function getFechaVencimiento(): ?\DateTimeInterface
    {
        return $this->fecha_vencimiento;
    }

    public function setFechaVencimiento(\DateTimeInterface $fecha_vencimiento): self
    {
        $this->fecha_vencimiento = $fecha_vencimiento;

        return $this;
    }

    public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->fecha_registro;
    }

    public function setFechaRegistro(\DateTimeInterface $fecha_registro): self
    {
        $this->fecha_registro = $fecha_registro;

        return $this;
    }

    public function getTipoNotaCredito(): ?string
    {
        return $this->tipo_nota_credito;
    }

    public function setTipoNotaCredito(?string $tipo_nota_credito): self
    {
        $this->tipo_nota_credito = $tipo_nota_credito;

        return $this;
    }

    public function getTipoNotaDebito(): ?string
    {
        return $this->tipo_nota_debito;
    }

    public function setTipoNotaDebito(?string $tipo_nota_debito): self
    {
        $this->tipo_nota_debito = $tipo_nota_debito;

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

    public function getCorrelativo(): ?string
    {
        return $this->correlativo;
    }

    public function setCorrelativo(string $correlativo): self
    {
        $this->correlativo = $correlativo;

        return $this;
    }

    public function getConcepto(): ?string
    {
        return $this->concepto;
    }

    public function setConcepto(string $concepto): self
    {
        $this->concepto = $concepto;

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

    public function getImporte(): ?string
    {
        return $this->importe;
    }

    public function setImporte(string $importe): self
    {
        $this->importe = $importe;

        return $this;
    }

    public function getBase(): ?string
    {
        return $this->base;
    }

    public function setBase(string $base): self
    {
        $this->base = $base;

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

    public function getServicio(): ?string
    {
        return $this->servicio;
    }

    public function setServicio(string $servicio): self
    {
        $this->servicio = $servicio;

        return $this;
    }

    public function getServicios(): ?string
    {
        return $this->servicios;
    }

    public function setServicios(string $servicios): self
    {
        $this->servicios = $servicios;

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
     * @return Collection|Vinculo[]
     */
    public function getPrincipalVinculos(): Collection
    {
        return $this->principal_vinculos;
    }

    public function addPrincipalVinculo(Vinculo $principalVinculo): self
    {
        if (!$this->principal_vinculos->contains($principalVinculo)) {
            $this->principal_vinculos[] = $principalVinculo;
            $principalVinculo->setComprobantePrincipalId($this);
        }

        return $this;
    }

    public function removePrincipalVinculo(Vinculo $principalVinculo): self
    {
        if ($this->principal_vinculos->contains($principalVinculo)) {
            $this->principal_vinculos->removeElement($principalVinculo);
            // set the owning side to null (unless already changed)
            if ($principalVinculo->getComprobantePrincipalId() === $this) {
                $principalVinculo->setComprobantePrincipalId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vinculo[]
     */
    public function getSecundarioVinculos(): Collection
    {
        return $this->secundario_vinculos;
    }

    public function addSecundarioVinculo(Vinculo $secundarioVinculo): self
    {
        if (!$this->secundario_vinculos->contains($secundarioVinculo)) {
            $this->secundario_vinculos[] = $secundarioVinculo;
            $secundarioVinculo->setComprobanteSecundarioId($this);
        }

        return $this;
    }

    public function removeSecundarioVinculo(Vinculo $secundarioVinculo): self
    {
        if ($this->secundario_vinculos->contains($secundarioVinculo)) {
            $this->secundario_vinculos->removeElement($secundarioVinculo);
            // set the owning side to null (unless already changed)
            if ($secundarioVinculo->getComprobanteSecundarioId() === $this) {
                $secundarioVinculo->setComprobanteSecundarioId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pago[]
     */
    public function getPagos(): Collection
    {
        return $this->pagos;
    }

    public function addPago(Pago $pago): self
    {
        if (!$this->pagos->contains($pago)) {
            $this->pagos[] = $pago;
            $pago->setComprobanteId($this);
        }

        return $this;
    }

    public function removePago(Pago $pago): self
    {
        if ($this->pagos->contains($pago)) {
            $this->pagos->removeElement($pago);
            // set the owning side to null (unless already changed)
            if ($pago->getComprobanteId() === $this) {
                $pago->setComprobanteId(null);
            }
        }

        return $this;
    }
}
