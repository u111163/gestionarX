<?php

namespace App\Entity;

use App\Repository\PersonalPagoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonalPagoRepository::class)
 */
class PersonalPago
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity=Personal::class, inversedBy="personalPagos")
     */
    private $personal_id;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $remuneracion;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $dependientes;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $dependientesv;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $gratificacion;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $gratificacionv;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $asig_especial;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $asig_especialv;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $otros;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $otrosv;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $aporte_obligario;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $aporte_obligatoriov;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $afp;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $afpv;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $comision_afp;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $comision_afpv;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=2, nullable=true)
     */
    private $essalud_regular;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $essalud_regularv;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $essalud_vida;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $essalud_vidav;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $imp_renta;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $imp_rentav;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $importe_recibido;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $afecto;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
     */
    private $afectov;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=true)
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
     * @ORM\OneToMany(targetEntity=PagoPersonal::class, mappedBy="personal_pago_id")
     */
    private $pagoPersonals;

    public function __construct()
    {
        $this->pagoPersonals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPersonalId(): ?Personal
    {
        return $this->personal_id;
    }

    public function setPersonalId(?Personal $personal_id): self
    {
        $this->personal_id = $personal_id;

        return $this;
    }

    public function getRemuneracion(): ?string
    {
        return $this->remuneracion;
    }

    public function setRemuneracion(?string $remuneracion): self
    {
        $this->remuneracion = $remuneracion;

        return $this;
    }

    public function getDependientes(): ?bool
    {
        return $this->dependientes;
    }

    public function setDependientes(?bool $dependientes): self
    {
        $this->dependientes = $dependientes;

        return $this;
    }

    public function getDependientesv(): ?string
    {
        return $this->dependientesv;
    }

    public function setDependientesv(?string $dependientesv): self
    {
        $this->dependientesv = $dependientesv;

        return $this;
    }

    public function getGratificacion(): ?string
    {
        return $this->gratificacion;
    }

    public function setGratificacion(?string $gratificacion): self
    {
        $this->gratificacion = $gratificacion;

        return $this;
    }

    public function getGratificacionv(): ?string
    {
        return $this->gratificacionv;
    }

    public function setGratificacionv(?string $gratificacionv): self
    {
        $this->gratificacionv = $gratificacionv;

        return $this;
    }

    public function getAsigEspecial(): ?string
    {
        return $this->asig_especial;
    }

    public function setAsigEspecial(?string $asig_especial): self
    {
        $this->asig_especial = $asig_especial;

        return $this;
    }

    public function getAsigEspecialv(): ?string
    {
        return $this->asig_especialv;
    }

    public function setAsigEspecialv(?string $asig_especialv): self
    {
        $this->asig_especialv = $asig_especialv;

        return $this;
    }

    public function getOtros(): ?string
    {
        return $this->otros;
    }

    public function setOtros(?string $otros): self
    {
        $this->otros = $otros;

        return $this;
    }

    public function getOtrosv(): ?string
    {
        return $this->otrosv;
    }

    public function setOtrosv(?string $otrosv): self
    {
        $this->otrosv = $otrosv;

        return $this;
    }

    public function getAporteObligario(): ?string
    {
        return $this->aporte_obligario;
    }

    public function setAporteObligario(?string $aporte_obligario): self
    {
        $this->aporte_obligario = $aporte_obligario;

        return $this;
    }

    public function getAporteObligatoriov(): ?string
    {
        return $this->aporte_obligatoriov;
    }

    public function setAporteObligatoriov(?string $aporte_obligatoriov): self
    {
        $this->aporte_obligatoriov = $aporte_obligatoriov;

        return $this;
    }

    public function getAfp(): ?string
    {
        return $this->afp;
    }

    public function setAfp(?string $afp): self
    {
        $this->afp = $afp;

        return $this;
    }

    public function getAfpv(): ?string
    {
        return $this->afpv;
    }

    public function setAfpv(?string $afpv): self
    {
        $this->afpv = $afpv;

        return $this;
    }

    public function getComisionAfp(): ?string
    {
        return $this->comision_afp;
    }

    public function setComisionAfp(?string $comision_afp): self
    {
        $this->comision_afp = $comision_afp;

        return $this;
    }

    public function getComisionAfpv(): ?string
    {
        return $this->comision_afpv;
    }

    public function setComisionAfpv(?string $comision_afpv): self
    {
        $this->comision_afpv = $comision_afpv;

        return $this;
    }

    public function getEssaludRegular(): ?string
    {
        return $this->essalud_regular;
    }

    public function setEssaludRegular(?string $essalud_regular): self
    {
        $this->essalud_regular = $essalud_regular;

        return $this;
    }

    public function getEssaludRegularv(): ?string
    {
        return $this->essalud_regularv;
    }

    public function setEssaludRegularv(?string $essalud_regularv): self
    {
        $this->essalud_regularv = $essalud_regularv;

        return $this;
    }

    public function getEssaludVida(): ?string
    {
        return $this->essalud_vida;
    }

    public function setEssaludVida(?string $essalud_vida): self
    {
        $this->essalud_vida = $essalud_vida;

        return $this;
    }

    public function getEssaludVidav(): ?string
    {
        return $this->essalud_vidav;
    }

    public function setEssaludVidav(?string $essalud_vidav): self
    {
        $this->essalud_vidav = $essalud_vidav;

        return $this;
    }

    public function getImpRenta(): ?string
    {
        return $this->imp_renta;
    }

    public function setImpRenta(?string $imp_renta): self
    {
        $this->imp_renta = $imp_renta;

        return $this;
    }

    public function getImpRentav(): ?string
    {
        return $this->imp_rentav;
    }

    public function setImpRentav(?string $imp_rentav): self
    {
        $this->imp_rentav = $imp_rentav;

        return $this;
    }

    public function getImporteRecibido(): ?string
    {
        return $this->importe_recibido;
    }

    public function setImporteRecibido(?string $importe_recibido): self
    {
        $this->importe_recibido = $importe_recibido;

        return $this;
    }

    public function getAfecto(): ?bool
    {
        return $this->afecto;
    }

    public function setAfecto(?bool $afecto): self
    {
        $this->afecto = $afecto;

        return $this;
    }

    public function getAfectov(): ?string
    {
        return $this->afectov;
    }

    public function setAfectov(?string $afectov): self
    {
        $this->afectov = $afectov;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(?string $total): self
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
            $pagoPersonal->setPersonalPagoId($this);
        }

        return $this;
    }

    public function removePagoPersonal(PagoPersonal $pagoPersonal): self
    {
        if ($this->pagoPersonals->contains($pagoPersonal)) {
            $this->pagoPersonals->removeElement($pagoPersonal);
            // set the owning side to null (unless already changed)
            if ($pagoPersonal->getPersonalPagoId() === $this) {
                $pagoPersonal->setPersonalPagoId(null);
            }
        }

        return $this;
    }
}
