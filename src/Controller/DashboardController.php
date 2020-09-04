<?php
// ./src/Controller/DashboardController

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends AbstractController
{
    private $data = [
        'id' => 'dashboard',
        'title' => 'Dashboard',
        'titles' => 'Nueva Empresa',
        'subtitle' => 'Agrege, modifique o elimine empresas...',
        'columns' => [
            '#',
            'Distrito',
            'RUC',
            'Razon Social',
            'Direccion',
            'Teléfono',
            'Opciones'
        ]
    ];


    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(Request $request): Response
    {
        $companies = [
            'Apple' => '$1.16 trillion USD',
            'Samsung' => '$298.68 billion USD',
            'Microsoft' => '$1.10 trillion USD',
            'Alphabet' => '$878.48 billion USD',
            'Intel Corporation' => '$245.82 billion USD',
            'IBM' => '$120.03 billion USD',
            'Facebook' => '$552.39 billion USD',
            'Hon Hai Precision' => '$38.72 billion USD',
            'Tencent' => '$3.02 trillion USD',
            'Oracle' => '$180.54 billion USD',
        ];

        return $this->render('dashboard/index.html.twig', [
            'companies' => $companies,
            'data' => $this->data,
        ]);
    }

}
