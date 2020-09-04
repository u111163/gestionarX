<?php

namespace App\Entity;

use App\Repository\CuentaCreditoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CuentaCreditoRepository::class)
 */
class CuentaCredito
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="cuentaCreditos")
     */
    private $empresa_id;

    /**
     * @ORM\ManyToOne(targetEntity=Banco::class, inversedBy="cuentaCreditos")
     */
    private $banco_id;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $numero_cci;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $moneda;

    /**
     * @ORM\Column(type="text")
     */
    private $descripcion;

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
     * @ORM\OneToMany(targetEntity=Pago::class, mappedBy="cuenta_credito_id")
     */
    private $pagos;

    /**
     * @ORM\OneToMany(targetEntity=PagoPersonal::class, mappedBy="cuenta_credito_id")
     */
    private $pagoPersonals;

    public function __construct()
    {
        $this->pagos = new ArrayCollection();
        $this->pagoPersonals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getBancoId(): ?Banco
    {
        return $this->banco_id;
    }

    public function setBancoId(?Banco $banco_id): self
    {
        $this->banco_id = $banco_id;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNumeroCci(): ?string
    {
        return $this->numero_cci;
    }

    public function setNumeroCci(?string $numero_cci): self
    {
        $this->numero_cci = $numero_cci;

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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

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
            $pago->setCuentaCreditoId($this);
        }

        return $this;
    }

    public function removePago(Pago $pago): self
    {
        if ($this->pagos->contains($pago)) {
            $this->pagos->removeElement($pago);
            // set the owning side to null (unless already changed)
            if ($pago->getCuentaCreditoId() === $this) {
                $pago->setCuentaCreditoId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PagoPersonal[]
     */
    public function getPagoPersonals(): Collection
    {
        return $this->pagoPersonals;
    }

    public function addPagoPersonal(PagoPersonal $pagoPersonal): self
    {
        if (!$this->pagoPersonals->contains($pagoPersonal)) {
            $this->pagoPersonals[] = $pagoPersonal;
            $pagoPersonal->setCuentaCreditoId($this);
        }

        return $this;
    }

    public function removePagoPersonal(PagoPersonal $pagoPersonal): self
    {
        if ($this->pagoPersonals->contains($pagoPersonal)) {
            $this->pagoPersonals->removeElement($pagoPersonal);
            // set the owning side to null (unless already changed)
            if ($pagoPersonal->getCuentaCreditoId() === $this) {
                $pagoPersonal->setCuentaCreditoId(null);
            }
        }

        return $this;
    }
}
