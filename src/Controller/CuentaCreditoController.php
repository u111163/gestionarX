<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CuentaCreditoController extends AbstractController
{
    /**
     * @Route("/cuenta/credito", name="cuenta_credito")
     */
    public function index()
    {
        return $this->render('pages/cuenta_credito/index.html.twig', [
            'controller_name' => 'CuentaCreditoController',
        ]);
    }
}
