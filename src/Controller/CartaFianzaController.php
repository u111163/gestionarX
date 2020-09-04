<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CartaFianzaController extends AbstractController
{
    /**
     * @Route("/carta-fianza", name="carta-fianza")
     */
    public function index()
    {
        return $this->render('pages/carta_fianza/index.html.twig', [
            'controller_name' => 'CartaFianzaController',
        ]);
    }

	/**
     * @Route("/carta-fianza/list", methods={"GET"})
     */
    public function list()
    {
    	return "LIST";
    }

    /**
     * @Route("/carta-fianza/{id}", methods={"GET"})
     */
    public function show()
    {
    	return "SHOW";
    }

    /**
     * @Route("/carta-fianza", methods={"POST"})
     */
    public function store()
    {
    	return "STORE";
    }

    /**
     * @Route("/carta-fianza/{id}", methods={"PUT"})
     */
    public function update()
    {
    	return "UPDATE";
    }

    /**
     * @Route("/carta-fianza/{id}", methods={"DELETE"})
     */
    public function delete()
    {
    	return "DELETE";
    }
}