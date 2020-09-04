<?php

namespace App\Entity;

use App\Repository\PersonalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonalRepository::class)
 */
class Personal
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="personals")
     */
    private $empresa_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombres;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $foto;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $dni;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $ruc;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $afp;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_nacimiento;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $cuspp;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $cargo;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_ingreso;

    /**
     * @ORM\Column(type="boolean")
     */
    private $es_planilla;

    /**
     * @ORM\Column(type="boolean")
     */
    private $es_honorario;

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
     * @ORM\OneToMany(targetEntity=PersonalPago::class, mappedBy="personal_id")
     */
    private $personalPagos;

    public function __construct()
    {
        $this->personalPagos = new ArrayCollection();
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

    public function getNombres(): ?string
    {
        return $this->nombres;
    }

    public function setNombres(string $nombres): self
    {
        $this->nombres = $nombres;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): self
    {
        $this->foto = $foto;

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

    public function getRuc(): ?string
    {
        return $this->ruc;
    }

    public function setRuc(string $ruc): self
    {
        $this->ruc = $ruc;

        return $this;
    }

    public function getAfp(): ?string
    {
        return $this->afp;
    }

    public function setAfp(string $afp): self
    {
        $this->afp = $afp;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fecha_nacimiento;
    }

    public function setFechaNacimiento(\DateTimeInterface $fecha_nacimiento): self
    {
        $this->fecha_nacimiento = $fecha_nacimiento;

        return $this;
    }

    public function getCuspp(): ?string
    {
        return $this->cuspp;
    }

    public function setCuspp(string $cuspp): self
    {
        $this->cuspp = $cuspp;

        return $this;
    }

    public function getCargo(): ?string
    {
        return $this->cargo;
    }

    public function setCargo(string $cargo): self
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getFechaIngreso(): ?\DateTimeInterface
    {
        return $this->fecha_ingreso;
    }

    public function setFechaIngreso(\DateTimeInterface $fecha_ingreso): self
    {
        $this->fecha_ingreso = $fecha_ingreso;

        return $this;
    }

    public function getEsPlanilla(): ?bool
    {
        return $this->es_planilla;
    }

    public function setEsPlanilla(bool $es_planilla): self
    {
        $this->es_planilla = $es_planilla;

        return $this;
    }

    public function getEsHonorario(): ?bool
    {
        return $this->es_honorario;
    }

    public function setEsHonorario(bool $es_honorario): self
    {
        $this->es_honorario = $es_honorario;

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
     * @return Collection|PersonalPago[]
     */
    public function getPersonalPagos(): Collection
    {
        return $this->personalPagos;
    }

    public function addPersonalPago(PersonalPago $personalPago): self
    {
        if (!$this->personalPagos->contains($personalPago)) {
            $this->personalPagos[] = $personalPago;
            $personalPago->setPersonalId($this);
        }

        return $this;
    }

    public function removePersonalPago(PersonalPago $personalPago): self
    {
        if ($this->personalPagos->contains($personalPago)) {
            $this->personalPagos->removeElement($personalPago);
            // set the owning side to null (unless already changed)
            if ($personalPago->getPersonalId() === $this) {
                $personalPago->setPersonalId(null);
            }
        }

        return $this;
    }
}
