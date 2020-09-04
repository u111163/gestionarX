<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FichaProyectoController extends AbstractController
{
    /**
     * @Route("/ficha/proyecto", name="ficha_proyecto")
     */
    public function index()
    {
        return $this->render('pages/ficha_proyecto/index.html.twig', [
            'controller_name' => 'FichaProyectoController',
        ]);
    }
}
