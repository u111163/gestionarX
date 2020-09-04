<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CajaChicaController extends AbstractController
{
    /**
     * @Route("/caja-chica", name="caja-chica")
     */
    public function index()
    {
        return $this->render('pages/caja_chica/index.html.twig', [
            'controller_name' => 'CajaChicaController',
        ]);
    }

	/**
     * @Route("/caja-chica/list", methods={"GET"})
     */
    public function list()
    {
    	return "LIST";
    }

    /**
     * @Route("/caja-chica/{id}", methods={"GET"})
     */
    public function show()
    {
    	return "SHOW";
    }

    /**
     * @Route("/caja-chica", methods={"POST"})
     */
    public function store()
    {
    	return "STORE";
    }

    /**
     * @Route("/caja-chica/{id}", methods={"PUT"})
     */
    public function update()
    {
    	return "UPDATE";
    }

    /**
     * @Route("/caja-chica/{id}", methods={"DELETE"})
     */
    public function delete()
    {
    	return "DELETE";
    }
}