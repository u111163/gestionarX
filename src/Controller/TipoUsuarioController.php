<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TipoUsuarioController extends AbstractController
{
    /**
     * @Route("/tipo/usuario", name="tipo_usuario")
     */
    public function index()
    {
        return $this->render('pages/tipo_usuario/index.html.twig', [
            'controller_name' => 'TipoUsuarioController',
        ]);
    }
}
