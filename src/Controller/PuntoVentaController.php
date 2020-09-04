<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PuntoVentaController extends AbstractController
{
    /**
     * @Route("/punto-venta", name="punto-venta")
     */
    public function index()
    {
        return $this->render('pages/punto_venta/index.html.twig', [
            'controller_name' => 'PuntoVentaController',
        ]);
    }

	/**
     * @Route("/punto-venta/list", methods={"GET"})
     */
    public function list()
    {
    	return "LIST";
    }

    /**
     * @Route("/punto-venta/{id}", methods={"GET"})
     */
    public function show()
    {
    	return "SHOW";
    }

    /**
     * @Route("/punto-venta", methods={"POST"})
     */
    public function store()
    {
    	return "STORE";
    }

    /**
     * @Route("/punto-venta/{id}", methods={"PUT"})
     */
    public function update()
    {
    	return "UPDATE";
    }

    /**
     * @Route("/punto-venta/{id}", methods={"DELETE"})
     */
    public function detele()
    {
    	return "DELETE";
    }
}