<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProyectoController extends AbstractController
{
    /**
     * @Route("/proyecto", name="proyecto")
     */
    public function index()
    {
        return $this->render('pages/proyecto/index.html.twig', [
            'controller_name' => 'ProyectoController',
        ]);
    }

	/**
     * @Route("/proyecto/list", methods={"GET"})
     */
    public function list()
    {
    	return "LIST";
    }

    /**
     * @Route("/proyecto/{id}", methods={"GET"})
     */
    public function show()
    {
    	return "SHOW";
    }

    /**
     * @Route("/proyecto", methods={"POST"})
     */
    public function store()
    {
    	return "STORE";
    }

    /**
     * @Route("/proyecto/{id}", methods={"PUT"})
     */
    public function update()
    {
    	return "UPDATE";
    }

    /**
     * @Route("/proyecto/{id}", methods={"DELETE"})
     */
    public function detele()
    {
    	return "DELETE";
    }
}