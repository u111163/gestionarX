<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EfectuarVentaController extends AbstractController
{
    /**
     * @Route("/efectuar/venta", name="efectuar_venta")
     */
    public function index()
    {
        return $this->render('pages/efectuar_venta/index.html.twig', [
            'controller_name' => 'EfectuarVentaController',
        ]);
    }
}
