<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UbigeoController extends AbstractController
{
    /**
     * @Route("/ubigeo", name="ubigeo")
     */
    public function index()
    {
        return $this->render('pages/ubigeo/index.html.twig', [
            'controller_name' => 'UbigeoController',
        ]);
    }
}
