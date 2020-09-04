<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=TipoUsuario::class, inversedBy="usuarios")
     */
    private $tipo_usuario_id;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="usuarios")
     */
    private $empresa_id;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $dni;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombres;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $password;

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
     * @ORM\OneToMany(targetEntity=Comprobante::class, mappedBy="usuario_id")
     */
    private $comprobantes;

    /**
     * @ORM\OneToMany(targetEntity=CajaChica::class, mappedBy="usuario_id")
     */
    private $cajaChicas;

    /**
     * @ORM\OneToMany(targetEntity=Pago::class, mappedBy="usuario_id")
     */
    private $pagos;

    public function __construct()
    {
        $this->estado = true;
        $this->created_at = new \DateTime();
        $this->updated_at = new \DateTime();
        
        $this->comprobantes = new ArrayCollection();
        $this->cajaChicas = new ArrayCollection();
        $this->pagos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoUsuarioId(): ?TipoUsuario
    {
        return $this->tipo_usuario_id;
    }

    public function setTipoUsuarioId(?TipoUsuario $tipo_usuario_id): self
    {
        $this->tipo_usuario_id = $tipo_usuario_id;

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

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function getNombres(): ?string
    {
        return $this->nombres;
    }

    public function setNombres(string $nombres): self
    {
        $this->nombres = $nombres;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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
            $comprobante->setUsuarioId($this);
        }

        return $this;
    }

    public function removeComprobante(Comprobante $comprobante): self
    {
        if ($this->comprobantes->contains($comprobante)) {
            $this->comprobantes->removeElement($comprobante);
            // set the owning side to null (unless already changed)
            if ($comprobante->getUsuarioId() === $this) {
                $comprobante->setUsuarioId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CajaChica[]
     */
    public function getCajaChicas(): Collection
    {
        return $this->cajaChicas;
    }

    public function addCajaChica(CajaChica $cajaChica): self
    {
        if (!$this->cajaChicas->contains($cajaChica)) {
            $this->cajaChicas[] = $cajaChica;
            $cajaChica->setUsuarioId($this);
        }

        return $this;
    }

    public function removeCajaChica(CajaChica $cajaChica): self
    {
        if ($this->cajaChicas->contains($cajaChica)) {
            $this->cajaChicas->removeElement($cajaChica);
            // set the owning side to null (unless already changed)
            if ($cajaChica->getUsuarioId() === $this) {
                $cajaChica->setUsuarioId(null);
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
            $pago->setUsuarioId($this);
        }

        return $this;
    }

    public function removePago(Pago $pago): self
    {
        if ($this->pagos->contains($pago)) {
            $this->pagos->removeElement($pago);
            // set the owning side to null (unless already changed)
            if ($pago->getUsuarioId() === $this) {
                $pago->setUsuarioId(null);
            }
        }

        return $this;
    }
}
