<?php

namespace App\Entity;

use App\Repository\SerieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SerieRepository::class)
 */
class Serie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=PuntoVenta::class, inversedBy="series")
     */
    private $punto_venta_id;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $cod_sunat;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nombre_comprobante;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $serie;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $numero;

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

    public function getPuntoVentaId(): ?PuntoVenta
    {
        return $this->punto_venta_id;
    }

    public function setPuntoVentaId(?PuntoVenta $punto_venta_id): self
    {
        $this->punto_venta_id = $punto_venta_id;

        return $this;
    }

    public function getCodSunat(): ?string
    {
        return $this->cod_sunat;
    }

    public function setCodSunat(string $cod_sunat): self
    {
        $this->cod_sunat = $cod_sunat;

        return $this;
    }

    public function getNombreComprobante(): ?string
    {
        return $this->nombre_comprobante;
    }

    public function setNombreComprobante(string $nombre_comprobante): self
    {
        $this->nombre_comprobante = $nombre_comprobante;

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

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

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
