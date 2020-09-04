<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ExcelController extends AbstractController
{
    /**
     * @Route("/excel", name="excel")
     */
    public function index()
    {
        return $this->render('pages/excel/index.html.twig', [
            'controller_name' => 'ExcelController',
        ]);
    }
}
