<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UnidadMedidaController extends AbstractController
{
    /**
     * @Route("/unidad-medida", name="unidad-medida")
     */
    public function index()
    {
        return $this->render('pages/unidad_medida/index.html.twig', [
            'controller_name' => 'UnidadMedidaController',
        ]);
    }

	/**
     * @Route("/unidad-medida/list", methods={"GET"})
     */
    public function list()
    {
    	return "LIST";
    }

    /**
     * @Route("/unidad-medida/{id}", methods={"GET"})
     */
    public function show()
    {
    	return "SHOW";
    }

    /**
     * @Route("/unidad-medida", methods={"POST"})
     */
    public function store()
    {
    	return "STORE";
    }

    /**
     * @Route("/unidad-medida/{id}", methods={"PUT"})
     */
    public function update()
    {
    	return "UPDATE";
    }

    /**
     * @Route("/unidad-medida/{id}", methods={"DELETE"})
     */
    public function delete()
    {
    	return "DELETE";
    }
}