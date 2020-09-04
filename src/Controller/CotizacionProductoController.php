<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CotizacionProductoController extends AbstractController
{
    /**
     * @Route("/cotizacion/producto", name="cotizacion_producto")
     */
    public function index()
    {
        return $this->render('pages/cotizacion_producto/index.html.twig', [
            'controller_name' => 'CotizacionProductoController',
        ]);
    }
}
