<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OrdenProductoController extends AbstractController
{
    /**
     * @Route("/orden/producto", name="orden_producto")
     */
    public function index()
    {
        return $this->render('pages/orden_producto/index.html.twig', [
            'controller_name' => 'OrdenProductoController',
        ]);
    }
}
