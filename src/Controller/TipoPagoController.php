<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TipoPagoController extends AbstractController
{
    /**
     * @Route("/tipo/pago", name="tipo_pago")
     */
    public function index()
    {
        return $this->render('pages/tipo_pago/index.html.twig', [
            'controller_name' => 'TipoPagoController',
        ]);
    }
}
