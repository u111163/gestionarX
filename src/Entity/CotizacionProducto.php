<?php

namespace App\Entity;

use App\Repository\CotizacionProductoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CotizacionProductoRepository::class)
 */
class CotizacionProducto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Cotizacion::class, inversedBy="cotizacionProductos")
     */
    private $cotizacion_id;

    /**
     * @ORM\ManyToOne(targetEntity=Producto::class, inversedBy="cotizacionProductos")
     */
    private $producto_id;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="cotizacionProductos")
     */
    private $empresa_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $precio_unitario;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $precio_venta;

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

    public function getCotizacionId(): ?Cotizacion
    {
        return $this->cotizacion_id;
    }

    public function setCotizacionId(?Cotizacion $cotizacion_id): self
    {
        $this->cotizacion_id = $cotizacion_id;

        return $this;
    }

    public function getProductoId(): ?Producto
    {
        return $this->producto_id;
    }

    public function setProductoId(?Producto $producto_id): self
    {
        $this->producto_id = $producto_id;

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

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

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

    public function getPrecioUnitario(): ?string
    {
        return $this->precio_unitario;
    }

    public function setPrecioUnitario(string $precio_unitario): self
    {
        $this->precio_unitario = $precio_unitario;

        return $this;
    }

    public function getPrecioVenta(): ?string
    {
        return $this->precio_venta;
    }

    public function setPrecioVenta(string $precio_venta): self
    {
        $this->precio_venta = $precio_venta;

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
