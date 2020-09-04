<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PagosPersonalController extends AbstractController
{
    /**
     * @Route("/pagos/personal", name="pagos_personal")
     */
    public function index()
    {
        return $this->render('pages/pagos_personal/index.html.twig', [
            'controller_name' => 'PagosPersonalController',
        ]);
    }
}
