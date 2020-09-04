<?php

namespace App\Entity;

use App\Repository\FormaPagoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormaPagoRepository::class)
 */
class FormaPago
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

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
     * @ORM\OneToMany(targetEntity=Pago::class, mappedBy="forma_pago_id")
     */
    private $pagos;

    /**
     * @ORM\OneToMany(targetEntity=OrdenCompra::class, mappedBy="forma_pago_id")
     */
    private $ordenCompras;

    public function __construct()
    {
        $this->estado = true;
        $this->created_at = new \DateTime();
        $this->updated_at = new \DateTime();
        
        $this->pagos = new ArrayCollection();
        $this->ordenCompras = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $pago->setFormaPagoId($this);
        }

        return $this;
    }

    public function removePago(Pago $pago): self
    {
        if ($this->pagos->contains($pago)) {
            $this->pagos->removeElement($pago);
            // set the owning side to null (unless already changed)
            if ($pago->getFormaPagoId() === $this) {
                $pago->setFormaPagoId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|OrdenCompra[]
     */
    public function getOrdenCompras(): Collection
    {
        return $this->ordenCompras;
    }

    public function addOrdenCompra(OrdenCompra $ordenCompra): self
    {
        if (!$this->ordenCompras->contains($ordenCompra)) {
            $this->ordenCompras[] = $ordenCompra;
            $ordenCompra->setFormaPagoId($this);
        }

        return $this;
    }

    public function removeOrdenCompra(OrdenCompra $ordenCompra): self
    {
        if ($this->ordenCompras->contains($ordenCompra)) {
            $this->ordenCompras->removeElement($ordenCompra);
            // set the owning side to null (unless already changed)
            if ($ordenCompra->getFormaPagoId() === $this) {
                $ordenCompra->setFormaPagoId(null);
            }
        }

        return $this;
    }
}
