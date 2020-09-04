<?php

namespace App\Entity;

use App\Repository\OrdenProductoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdenProductoRepository::class)
 */
class OrdenProducto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=OrdenCompra::class, inversedBy="ordenProductos")
     */
    private $orden_compra_id;

    /**
     * @ORM\ManyToOne(targetEntity=Producto::class, inversedBy="ordenProductos")
     */
    private $producto_id;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="ordenProductos")
     */
    private $empresa_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrdenCompraId(): ?OrdenCompra
    {
        return $this->orden_compra_id;
    }

    public function setOrdenCompraId(?OrdenCompra $orden_compra_id): self
    {
        $this->orden_compra_id = $orden_compra_id;

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
}
