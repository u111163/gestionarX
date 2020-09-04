<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClienteRepository::class)
 */
class Cliente
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=400, nullable=true)
     */
    private $ubigeo;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="clientes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa_id;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $documento;

    /**
     * @ORM\Column(type="string", length=400)
     */
    private $razonsocial;

    /**
     * @ORM\Column(type="string", length=400, nullable=true)
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", length=13, nullable=true)
     */
    private $telff;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $telfc;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $contacto;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $email1;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $email2;

    /**
     * @ORM\Column(type="boolean")
     */
    private $escliente;

    /**
     * @ORM\Column(type="boolean")
     */
    private $esproveedor;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estado;

    /**
     * @ORM\Column(type="datetime")
     */
    private $create_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity=Comprobante::class, mappedBy="cliente_id")
     */
    private $comprobantes;

    /**
     * @ORM\OneToMany(targetEntity=Participante::class, mappedBy="cliente_id")
     */
    private $participantes;

    /**
     * @ORM\OneToMany(targetEntity=Cotizacion::class, mappedBy="cliente_id")
     */
    private $cotizacions;

    /**
     * @ORM\OneToMany(targetEntity=OrdenCompra::class, mappedBy="cliente_id")
     */
    private $ordenCompras;

    public function __construct()
    {
        $this->comprobantes = new ArrayCollection();
        $this->participantes = new ArrayCollection();
        $this->cotizacions = new ArrayCollection();
        $this->ordenCompras = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUbigeo(): ?string
    {
        return $this->ubigeo;
    }

    public function setUbigeo(?string $ubigeo): self
    {
        $this->ubigeo = $ubigeo;

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

    public function getDocumento(): ?string
    {
        return $this->documento;
    }

    public function setDocumento(string $documento): self
    {
        $this->documento = $documento;

        return $this;
    }

    public function getRazonsocial(): ?string
    {
        return $this->razonsocial;
    }

    public function setRazonsocial(string $razonsocial): self
    {
        $this->razonsocial = $razonsocial;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(?string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelff(): ?string
    {
        return $this->telff;
    }

    public function setTelff(?string $telff): self
    {
        $this->telff = $telff;

        return $this;
    }

    public function getTelfc(): ?string
    {
        return $this->telfc;
    }

    public function setTelfc(?string $telfc): self
    {
        $this->telfc = $telfc;

        return $this;
    }

    public function getContacto(): ?string
    {
        return $this->contacto;
    }

    public function setContacto(?string $contacto): self
    {
        $this->contacto = $contacto;

        return $this;
    }

    public function getEmail1(): ?string
    {
        return $this->email1;
    }

    public function setEmail1(?string $email1): self
    {
        $this->email1 = $email1;

        return $this;
    }

    public function getEmail2(): ?string
    {
        return $this->email2;
    }

    public function setEmail2(?string $email2): self
    {
        $this->email2 = $email2;

        return $this;
    }

    public function getEscliente(): ?bool
    {
        return $this->escliente;
    }

    public function setEscliente(bool $escliente): self
    {
        $this->escliente = $escliente;

        return $this;
    }

    public function getEsproveedor(): ?bool
    {
        return $this->esproveedor;
    }

    public function setEsproveedor(bool $esproveedor): self
    {
        $this->esproveedor = $esproveedor;

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

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->create_at;
    }

    public function setCreateAt(\DateTimeInterface $create_at): self
    {
        $this->create_at = $create_at;

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
            $comprobante->setClienteId($this);
        }

        return $this;
    }

    public function removeComprobante(Comprobante $comprobante): self
    {
        if ($this->comprobantes->contains($comprobante)) {
            $this->comprobantes->removeElement($comprobante);
            // set the owning side to null (unless already changed)
            if ($comprobante->getClienteId() === $this) {
                $comprobante->setClienteId(null);
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
            $participante->setClienteId($this);
        }

        return $this;
    }

    public function removeParticipante(Participante $participante): self
    {
        if ($this->participantes->contains($participante)) {
            $this->participantes->removeElement($participante);
            // set the owning side to null (unless already changed)
            if ($participante->getClienteId() === $this) {
                $participante->setClienteId(null);
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
            $cotizacion->setClienteId($this);
        }

        return $this;
    }

    public function removeCotizacion(Cotizacion $cotizacion): self
    {
        if ($this->cotizacions->contains($cotizacion)) {
            $this->cotizacions->removeElement($cotizacion);
            // set the owning side to null (unless already changed)
            if ($cotizacion->getClienteId() === $this) {
                $cotizacion->setClienteId(null);
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
            $ordenCompra->setClienteId($this);
        }

        return $this;
    }

    public function removeOrdenCompra(OrdenCompra $ordenCompra): self
    {
        if ($this->ordenCompras->contains($ordenCompra)) {
            $this->ordenCompras->removeElement($ordenCompra);
            // set the owning side to null (unless already changed)
            if ($ordenCompra->getClienteId() === $this) {
                $ordenCompra->setClienteId(null);
            }
        }

        return $this;
    }
}
