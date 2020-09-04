<?php

namespace App\Entity;

use App\Repository\ParticipanteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParticipanteRepository::class)
 */
class Participante
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Proyecto::class, inversedBy="participantes")
     */
    private $proyecto_id;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class, inversedBy="participantes")
     */
    private $cliente_id;

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

    public function getId(): ?int
    {
        return $this->id;
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

    public function getClienteId(): ?Cliente
    {
        return $this->cliente_id;
    }

    public function setClienteId(?Cliente $cliente_id): self
    {
        $this->cliente_id = $cliente_id;

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
}
