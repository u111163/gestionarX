<?php

namespace App\Entity;

use App\Repository\EmpresaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpresaRepository::class)
 */
class Empresa
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $ubigeo;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $ruc;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $razonsoc;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $telf;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

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
     * @ORM\OneToMany(targetEntity=Cliente::class, mappedBy="empresa_id", orphanRemoval=true)
     */
    private $clientes;

    /**
     * @ORM\OneToMany(targetEntity=Proyecto::class, mappedBy="empresa_id", orphanRemoval=true)
     */
    private $proyectos;

    /**
     * @ORM\OneToMany(targetEntity=Usuario::class, mappedBy="empresa_id")
     */
    private $usuarios;

    /**
     * @ORM\OneToMany(targetEntity=Comprobante::class, mappedBy="empresa_id")
     */
    private $comprobantes;

    /**
     * @ORM\OneToMany(targetEntity=CuentaCredito::class, mappedBy="empresa_id")
     */
    private $cuentaCreditos;

    /**
     * @ORM\OneToMany(targetEntity=Personal::class, mappedBy="empresa_id")
     */
    private $personals;

    /**
     * @ORM\OneToMany(targetEntity=CajaChica::class, mappedBy="empresa_id")
     */
    private $cajaChicas;

    /**
     * @ORM\OneToMany(targetEntity=Pago::class, mappedBy="empresa_id")
     */
    private $pagos;

    /**
     * @ORM\OneToMany(targetEntity=Vencimiento::class, mappedBy="empresa_id")
     */
    private $vencimientos;

    /**
     * @ORM\OneToMany(targetEntity=Apertura::class, mappedBy="empresa_id")
     */
    private $aperturas;

    /**
     * @ORM\OneToMany(targetEntity=PuntoVenta::class, mappedBy="empresa_id")
     */
    private $puntoVentas;

    /**
     * @ORM\OneToMany(targetEntity=Producto::class, mappedBy="empresa_id")
     */
    private $productos;

    /**
     * @ORM\OneToMany(targetEntity=Cotizacion::class, mappedBy="empresa_id")
     */
    private $cotizacions;

    /**
     * @ORM\OneToMany(targetEntity=CotizacionProducto::class, mappedBy="empresa_id")
     */
    private $cotizacionProductos;

    /**
     * @ORM\OneToMany(targetEntity=OrdenCompra::class, mappedBy="empresa_id")
     */
    private $ordenCompras;

    /**
     * @ORM\OneToMany(targetEntity=OrdenProducto::class, mappedBy="empresa_id")
     */
    private $ordenProductos;

    public function __construct()
    {
        $this->estado = true;
        $this->created_at = new \DateTime();
        $this->updated_at = new \DateTime();

        $this->clientes = new ArrayCollection();
        $this->proyectos = new ArrayCollection();
        $this->usuarios = new ArrayCollection();
        $this->comprobantes = new ArrayCollection();
        $this->cuentaCreditos = new ArrayCollection();
        $this->personals = new ArrayCollection();
        $this->cajaChicas = new ArrayCollection();
        $this->pagos = new ArrayCollection();
        $this->vencimientos = new ArrayCollection();
        $this->aperturas = new ArrayCollection();
        $this->puntoVentas = new ArrayCollection();
        $this->productos = new ArrayCollection();
        $this->cotizacions = new ArrayCollection();
        $this->cotizacionProductos = new ArrayCollection();
        $this->ordenCompras = new ArrayCollection();
        $this->ordenProductos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUbigeo(): ?string
    {
        return $this->ubigeo;
    }

    public function setUbigeo(string $ubigeo): self
    {
        $this->ubigeo = $ubigeo;

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

    public function getRazonsoc(): ?string
    {
        return $this->razonsoc;
    }

    public function setRazonsoc(string $razonsoc): self
    {
        $this->razonsoc = $razonsoc;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelf(): ?string
    {
        return $this->telf;
    }

    public function setTelf(string $telf): self
    {
        $this->telf = $telf;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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
     * @return Collection|Cliente[]
     */
    public function getClientes(): Collection
    {
        return $this->clientes;
    }

    public function addCliente(Cliente $cliente): self
    {
        if (!$this->clientes->contains($cliente)) {
            $this->clientes[] = $cliente;
            $cliente->setEmpresaId($this);
        }

        return $this;
    }

    public function removeCliente(Cliente $cliente): self
    {
        if ($this->clientes->contains($cliente)) {
            $this->clientes->removeElement($cliente);
            // set the owning side to null (unless already changed)
            if ($cliente->getEmpresaId() === $this) {
                $cliente->setEmpresaId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Proyecto[]
     */
    public function getProyectos(): Collection
    {
        return $this->proyectos;
    }

    public function addProyecto(Proyecto $proyecto): self
    {
        if (!$this->proyectos->contains($proyecto)) {
            $this->proyectos[] = $proyecto;
            $proyecto->setEmpresaId($this);
        }

        return $this;
    }

    public function removeProyecto(Proyecto $proyecto): self
    {
        if ($this->proyectos->contains($proyecto)) {
            $this->proyectos->removeElement($proyecto);
            // set the owning side to null (unless already changed)
            if ($proyecto->getEmpresaId() === $this) {
                $proyecto->setEmpresaId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Usuario[]
     */
    public function getUsuarios(): Collection
    {
        return $this->usuarios;
    }

    public function addUsuario(Usuario $usuario): self
    {
        if (!$this->usuarios->contains($usuario)) {
            $this->usuarios[] = $usuario;
            $usuario->setEmpresaId($this);
        }

        return $this;
    }

    public function removeUsuario(Usuario $usuario): self
    {
        if ($this->usuarios->contains($usuario)) {
            $this->usuarios->removeElement($usuario);
            // set the owning side to null (unless already changed)
            if ($usuario->getEmpresaId() === $this) {
                $usuario->setEmpresaId(null);
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
            $comprobante->setEmpresaId($this);
        }

        return $this;
    }

    public function removeComprobante(Comprobante $comprobante): self
    {
        if ($this->comprobantes->contains($comprobante)) {
            $this->comprobantes->removeElement($comprobante);
            // set the owning side to null (unless already changed)
            if ($comprobante->getEmpresaId() === $this) {
                $comprobante->setEmpresaId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CuentaCredito[]
     */
    public function getCuentaCreditos(): Collection
    {
        return $this->cuentaCreditos;
    }

    public function addCuentaCredito(CuentaCredito $cuentaCredito): self
    {
        if (!$this->cuentaCreditos->contains($cuentaCredito)) {
            $this->cuentaCreditos[] = $cuentaCredito;
            $cuentaCredito->setEmpresaId($this);
        }

        return $this;
    }

    public function removeCuentaCredito(CuentaCredito $cuentaCredito): self
    {
        if ($this->cuentaCreditos->contains($cuentaCredito)) {
            $this->cuentaCreditos->removeElement($cuentaCredito);
            // set the owning side to null (unless already changed)
            if ($cuentaCredito->getEmpresaId() === $this) {
                $cuentaCredito->setEmpresaId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Personal[]
     */
    public function getPersonals(): Collection
    {
        return $this->personals;
    }

    public function addPersonal(Personal $personal): self
    {
        if (!$this->personals->contains($personal)) {
            $this->personals[] = $personal;
            $personal->setEmpresaId($this);
        }

        return $this;
    }

    public function removePersonal(Personal $personal): self
    {
        if ($this->personals->contains($personal)) {
            $this->personals->removeElement($personal);
            // set the owning side to null (unless already changed)
            if ($personal->getEmpresaId() === $this) {
                $personal->setEmpresaId(null);
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
            $cajaChica->setEmpresaId($this);
        }

        return $this;
    }

    public function removeCajaChica(CajaChica $cajaChica): self
    {
        if ($this->cajaChicas->contains($cajaChica)) {
            $this->cajaChicas->removeElement($cajaChica);
            // set the owning side to null (unless already changed)
            if ($cajaChica->getEmpresaId() === $this) {
                $cajaChica->setEmpresaId(null);
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
            $pago->setEmpresaId($this);
        }

        return $this;
    }

    public function removePago(Pago $pago): self
    {
        if ($this->pagos->contains($pago)) {
            $this->pagos->removeElement($pago);
            // set the owning side to null (unless already changed)
            if ($pago->getEmpresaId() === $this) {
                $pago->setEmpresaId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vencimiento[]
     */
    public function getVencimientos(): Collection
    {
        return $this->vencimientos;
    }

    public function addVencimiento(Vencimiento $vencimiento): self
    {
        if (!$this->vencimientos->contains($vencimiento)) {
            $this->vencimientos[] = $vencimiento;
            $vencimiento->setEmpresaId($this);
        }

        return $this;
    }

    public function removeVencimiento(Vencimiento $vencimiento): self
    {
        if ($this->vencimientos->contains($vencimiento)) {
            $this->vencimientos->removeElement($vencimiento);
            // set the owning side to null (unless already changed)
            if ($vencimiento->getEmpresaId() === $this) {
                $vencimiento->setEmpresaId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Apertura[]
     */
    public function getAperturas(): Collection
    {
        return $this->aperturas;
    }

    public function addApertura(Apertura $apertura): self
    {
        if (!$this->aperturas->contains($apertura)) {
            $this->aperturas[] = $apertura;
            $apertura->setEmpresaId($this);
        }

        return $this;
    }

    public function removeApertura(Apertura $apertura): self
    {
        if ($this->aperturas->contains($apertura)) {
            $this->aperturas->removeElement($apertura);
            // set the owning side to null (unless already changed)
            if ($apertura->getEmpresaId() === $this) {
                $apertura->setEmpresaId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PuntoVenta[]
     */
    public function getPuntoVentas(): Collection
    {
        return $this->puntoVentas;
    }

    public function addPuntoVenta(PuntoVenta $puntoVenta): self
    {
        if (!$this->puntoVentas->contains($puntoVenta)) {
            $this->puntoVentas[] = $puntoVenta;
            $puntoVenta->setEmpresaId($this);
        }

        return $this;
    }

    public function removePuntoVenta(PuntoVenta $puntoVenta): self
    {
        if ($this->puntoVentas->contains($puntoVenta)) {
            $this->puntoVentas->removeElement($puntoVenta);
            // set the owning side to null (unless already changed)
            if ($puntoVenta->getEmpresaId() === $this) {
                $puntoVenta->setEmpresaId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Producto[]
     */
    public function getProductos(): Collection
    {
        return $this->productos;
    }

    public function addProducto(Producto $producto): self
    {
        if (!$this->productos->contains($producto)) {
            $this->productos[] = $producto;
            $producto->setEmpresaId($this);
        }

        return $this;
    }

    public function removeProducto(Producto $producto): self
    {
        if ($this->productos->contains($producto)) {
            $this->productos->removeElement($producto);
            // set the owning side to null (unless already changed)
            if ($producto->getEmpresaId() === $this) {
                $producto->setEmpresaId(null);
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
            $cotizacion->setEmpresaId($this);
        }

        return $this;
    }

    public function removeCotizacion(Cotizacion $cotizacion): self
    {
        if ($this->cotizacions->contains($cotizacion)) {
            $this->cotizacions->removeElement($cotizacion);
            // set the owning side to null (unless already changed)
            if ($cotizacion->getEmpresaId() === $this) {
                $cotizacion->setEmpresaId(null);
            }
        }

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
            $cotizacionProducto->setEmpresaId($this);
        }

        return $this;
    }

    public function removeCotizacionProducto(CotizacionProducto $cotizacionProducto): self
    {
        if ($this->cotizacionProductos->contains($cotizacionProducto)) {
            $this->cotizacionProductos->removeElement($cotizacionProducto);
            // set the owning side to null (unless already changed)
            if ($cotizacionProducto->getEmpresaId() === $this) {
                $cotizacionProducto->setEmpresaId(null);
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
            $ordenCompra->setEmpresaId($this);
        }

        return $this;
    }

    public function removeOrdenCompra(OrdenCompra $ordenCompra): self
    {
        if ($this->ordenCompras->contains($ordenCompra)) {
            $this->ordenCompras->removeElement($ordenCompra);
            // set the owning side to null (unless already changed)
            if ($ordenCompra->getEmpresaId() === $this) {
                $ordenCompra->setEmpresaId(null);
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
            $ordenProducto->setEmpresaId($this);
        }

        return $this;
    }

    public function removeOrdenProducto(OrdenProducto $ordenProducto): self
    {
        if ($this->ordenProductos->contains($ordenProducto)) {
            $this->ordenProductos->removeElement($ordenProducto);
            // set the owning side to null (unless already changed)
            if ($ordenProducto->getEmpresaId() === $this) {
                $ordenProducto->setEmpresaId(null);
            }
        }

        return $this;
    }
}
