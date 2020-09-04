<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CotizacionController extends AbstractController
{
    /**
     * @Route("/cotizacion", name="cotizacion")
     */
    public function index()
    {
        return $this->render('pages/cotizacion/index.html.twig', [
            'controller_name' => 'CotizacionController',
        ]);
    }
}
