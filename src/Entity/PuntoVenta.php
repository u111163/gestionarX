<?php

namespace App\Entity;

use App\Repository\PuntoVentaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PuntoVentaRepository::class)
 */
class PuntoVenta
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="puntoVentas")
     */
    private $empresa_id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $codigo;

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
     * @ORM\OneToMany(targetEntity=Serie::class, mappedBy="punto_venta_id")
     */
    private $series;

    /**
     * @ORM\OneToMany(targetEntity=Cotizacion::class, mappedBy="punto_venta_id")
     */
    private $cotizacions;

    public function __construct()
    {
        $this->series = new ArrayCollection();
        $this->cotizacions = new ArrayCollection();
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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

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
     * @return Collection|Serie[]
     */
    public function getSeries(): Collection
    {
        return $this->series;
    }

    public function addSeries(Serie $series): self
    {
        if (!$this->series->contains($series)) {
            $this->series[] = $series;
            $series->setPuntoVentaId($this);
        }

        return $this;
    }

    public function removeSeries(Serie $series): self
    {
        if ($this->series->contains($series)) {
            $this->series->removeElement($series);
            // set the owning side to null (unless already changed)
            if ($series->getPuntoVentaId() === $this) {
                $series->setPuntoVentaId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Cotizacion[]
     */
    public function getCotizacions(): Collection
    {
        return $this->cotizacions;
    }

    public function addCotizacion(Cotizacion $cotizacion): self
    {
        if (!$this->cotizacions->contains($cotizacion)) {
            $this->cotizacions[] = $cotizacion;
            $cotizacion->setPuntoVentaId($this);
        }

        return $this;
    }

    public function removeCotizacion(Cotizacion $cotizacion): self
    {
        if ($this->cotizacions->contains($cotizacion)) {
            $this->cotizacions->removeElement($cotizacion);
            // set the owning side to null (unless already changed)
            if ($cotizacion->getPuntoVentaId() === $this) {
                $cotizacion->setPuntoVentaId(null);
            }
        }

        return $this;
    }
}
