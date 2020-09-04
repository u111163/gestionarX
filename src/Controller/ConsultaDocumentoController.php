<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConsultaDocumentoController extends AbstractController
{
    /**
     * @Route("/consulta/documento", name="consulta_documento")
     */
    public function index()
    {
        return $this->render('pages/consulta_documento/index.html.twig', [
            'controller_name' => 'ConsultaDocumentoController',
        ]);
    }
}
