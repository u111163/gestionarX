<?php

namespace App\Entity;

use App\Repository\ProyectoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProyectoRepository::class)
 */
class Proyecto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="proyectos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa_id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $nombre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $moneda;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $importe_total;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estado;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $contrato;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity=Prestacion::class, mappedBy="proyecto_id")
     */
    private $prestacions;

    /**
     * @ORM\OneToMany(targetEntity=Comprobante::class, mappedBy="proyecto_id")
     */
    private $comprobantes;

    /**
     * @ORM\OneToMany(targetEntity=Participante::class, mappedBy="proyecto_id")
     */
    private $participantes;

    /**
     * @ORM\OneToMany(targetEntity=CartaFianza::class, mappedBy="proyecto_id")
     */
    private $cartaFianzas;

    public function __construct()
    {
        $this->prestacions = new ArrayCollection();
        $this->comprobantes = new ArrayCollection();
        $this->participantes = new ArrayCollection();
        $this->cartaFianzas = new ArrayCollection();
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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

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

    public function getImporteTotal(): ?string
    {
        return $this->importe_total;
    }

    public function setImporteTotal(string $importe_total): self
    {
        $this->importe_total = $importe_total;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

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

    public function getContrato(): ?string
    {
        return $this->contrato;
    }

    public function setContrato(string $contrato): self
    {
        $this->contrato = $contrato;

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
     * @return Collection|Prestacion[]
     */
    public function getPrestacions(): Collection
    {
        return $this->prestacions;
    }

    public function addPrestacion(Prestacion $prestacion): self
    {
        if (!$this->prestacions->contains($prestacion)) {
            $this->prestacions[] = $prestacion;
            $prestacion->setProyectoId($this);
        }

        return $this;
    }

    public function removePrestacion(Prestacion $prestacion): self
    {
        if ($this->prestacions->contains($prestacion)) {
            $this->prestacions->removeElement($prestacion);
            // set the owning side to null (unless already changed)
            if ($prestacion->getProyectoId() === $this) {
                $prestacion->setProyectoId(null);
            }
        }

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
            $comprobante->setProyectoId($this);
        }

        return $this;
    }

    public function removeComprobante(Comprobante $comprobante): self
    {
        if ($this->comprobantes->contains($comprobante)) {
            $this->comprobantes->removeElement($comprobante);
            // set the owning side to null (unless already changed)
            if ($comprobante->getProyectoId() === $this) {
                $comprobante->setProyectoId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Participante[]
     */
    public function getParticipantes(): Collection
    {
        return $this->participantes;
    }

    public function addParticipante(Participante $participante): self
    {
        if (!$this->participantes->contains($participante)) {
            $this->participantes[] = $participante;
            $participante->setProyectoId($this);
        }

        return $this;
    }

    public function removeParticipante(Participante $participante): self
    {
        if ($this->participantes->contains($participante)) {
            $this->participantes->removeElement($participante);
            // set the owning side to null (unless already changed)
            if ($participante->getProyectoId() === $this) {
                $participante->setProyectoId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CartaFianza[]
     */
    public function getCartaFianzas(): Collection
    {
        return $this->cartaFianzas;
    }

    public function addCartaFianza(CartaFianza $cartaFianza): self
    {
        if (!$this->cartaFianzas->contains($cartaFianza)) {
            $this->cartaFianzas[] = $cartaFianza;
            $cartaFianza->setProyectoId($this);
        }

        return $this;
    }

    public function removeCartaFianza(CartaFianza $cartaFianza): self
    {
        if ($this->cartaFianzas->contains($cartaFianza)) {
            $this->cartaFianzas->removeElement($cartaFianza);
            // set the owning side to null (unless already changed)
            if ($cartaFianza->getProyectoId() === $this) {
                $cartaFianza->setProyectoId(null);
            }
        }

        return $this;
    }
}
