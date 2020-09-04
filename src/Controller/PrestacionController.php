<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PrestacionController extends AbstractController
{
    /**
     * @Route("/prestacion", name="prestacion")
     */
    public function index()
    {
        return $this->render('pages/prestacion/index.html.twig', [
            'controller_name' => 'PrestacionController',
        ]);
    }
}
