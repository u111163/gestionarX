<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OrdenCompraController extends AbstractController
{
    /**
     * @Route("/orden/compra", name="orden_compra")
     */
    public function index()
    {
        return $this->render('pages/pages/orden_compra/index.html.twig', [
            'controller_name' => 'OrdenCompraController',
        ]);
    }
}
