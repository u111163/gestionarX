<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OperacionController extends AbstractController
{
    /**
     * @Route("/operacion", name="operacion")
     */
    public function index()
    {
        return $this->render('pages/operacion/index.html.twig', [
            'controller_name' => 'OperacionController',
        ]);
    }
}
