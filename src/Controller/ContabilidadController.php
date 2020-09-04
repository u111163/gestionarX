<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContabilidadController extends AbstractController
{
    /**
     * @Route("/contabilidad", name="contabilidad")
     */
    public function index()
    {
        return $this->render('pages/contabilidad/index.html.twig', [
            'controller_name' => 'ContabilidadController',
        ]);
    }
}
