<?php

namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductoRepository::class)
 */
class Producto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Categoria::class, inversedBy="productos")
     */
    private $categoria_id;

    /**
     * @ORM\ManyToOne(targetEntity=UnidadMedida::class, inversedBy="productos")
     */
    private $unidad_medida_id;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="productos")
     */
    private $empresa_id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bien;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $moneda;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $costo;

    /**
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $precio_min;

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

    /**
     * @ORM\OneToMany(targetEntity=CotizacionProducto::class, mappedBy="producto_id")
     */
    private $cotizacionProductos;

    /**
     * @ORM\OneToMany(targetEntity=OrdenProducto::class, mappedBy="producto_id")
     */
    private $ordenProductos;

    public function __construct()
    {
        $this->cotizacionProductos = new ArrayCollection();
        $this->ordenProductos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoriaId(): ?Categoria
    {
        return $this->categoria_id;
    }

    public function setCategoriaId(?Categoria $categoria_id): self
    {
        $this->categoria_id = $categoria_id;

        return $this;
    }

    public function getUnidadMedidaId(): ?UnidadMedida
    {
        return $this->unidad_medida_id;
    }

    public function setUnidadMedidaId(?UnidadMedida $unidad_medida_id): self
    {
        $this->unidad_medida_id = $unidad_medida_id;

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

    public function getBien(): ?bool
    {
        return $this->bien;
    }

    public function setBien(bool $bien): self
    {
        $this->bien = $bien;

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

    public function getMoneda(): ?string
    {
        return $this->moneda;
    }

    public function setMoneda(string $moneda): self
    {
        $this->moneda = $moneda;

        return $this;
    }

    public function getCosto(): ?string
    {
        return $this->costo;
    }

    public function setCosto(string $costo): self
    {
        $this->costo = $costo;

        return $this;
    }

    public function getPrecioMin(): ?string
    {
        return $this->precio_min;
    }

    public function setPrecioMin(string $precio_min): self
    {
        $this->precio_min = $precio_min;

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

    /**
     * @return Collection|CotizacionProducto[]
     */
    public function getCotizacionProductos(): Collection
    {
        return $this->cotizacionProductos;
    }

    public function addCotizacionProducto(CotizacionProducto $cotizacionProducto): self
    {
        if (!$this->cotizacionProductos->contains($cotizacionProducto)) {
            $this->cotizacionProductos[] = $cotizacionProducto;
            $cotizacionProducto->setProductoId($this);
        }

        return $this;
    }

    public function removeCotizacionProducto(CotizacionProducto $cotizacionProducto): self
    {
        if ($this->cotizacionProductos->contains($cotizacionProducto)) {
            $this->cotizacionProductos->removeElement($cotizacionProducto);
            // set the owning side to null (unless already changed)
            if ($cotizacionProducto->getProductoId() === $this) {
                $cotizacionProducto->setProductoId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|OrdenProducto[]
     */
    public function getOrdenProductos(): Collection
    {
        return $this->ordenProductos;
    }

    public function addOrdenProducto(OrdenProducto $ordenProducto): self
    {
        if (!$this->ordenProductos->contains($ordenProducto)) {
            $this->ordenProductos[] = $ordenProducto;
            $ordenProducto->setProductoId($this);
        }

        return $this;
    }

    public function removeOrdenProducto(OrdenProducto $ordenProducto): self
    {
        if ($this->ordenProductos->contains($ordenProducto)) {
            $this->ordenProductos->removeElement($ordenProducto);
            // set the owning side to null (unless already changed)
            if ($ordenProducto->getProductoId() === $this) {
                $ordenProducto->setProductoId(null);
            }
        }

        return $this;
    }
}
