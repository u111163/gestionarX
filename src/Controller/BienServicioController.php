<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BienServicioController extends AbstractController
{
    /**
     * @Route("/bien-servicio", name="bien-servicio")
     */
    public function index()
    {
        return $this->render('pages/bien_servicio/index.html.twig', [
            'controller_name' => 'BienServicioController',
        ]);
    }

	/**
     * @Route("/bien-servicio/list", methods={"GET"})
     */
    public function list()
    {
    	return "LIST";
    }

    /**
     * @Route("/bien-servicio/{id}", methods={"GET"})
     */
    public function show()
    {
    	return "SHOW";
    }

    /**
     * @Route("/bien-servicio", methods={"POST"})
     */
    public function store()
    {
    	return "STORE";
    }

    /**
     * @Route("/bien-servicio/{id}", methods={"PUT"})
     */
    public function update()
    {
    	return "UPDATE";
    }

    /**
     * @Route("/bien-servicio/{id}", methods={"DELETE"})
     */
    public function delete()
    {
    	return "DELETE";
    }
}