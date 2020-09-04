<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VencimientoController extends AbstractController
{
    /**
     * @Route("/vencimiento", name="vencimiento")
     */
    public function index()
    {
        return $this->render('pages/vencimiento/index.html.twig', [
            'controller_name' => 'VencimientoController',
        ]);
    }

	/**
     * @Route("/vencimiento/list", methods={"GET"})
     */
    public function list()
    {
    	return "LIST";
    }

    /**
     * @Route("/vencimiento/{id}", methods={"GET"})
     */
    public function show()
    {
    	return "SHOW";
    }

    /**
     * @Route("/vencimiento", methods={"POST"})
     */
    public function store()
    {
    	return "STORE";
    }

    /**
     * @Route("/vencimiento/{id}", methods={"PUT"})
     */
    public function update()
    {
    	return "UPDATE";
    }

    /**
     * @Route("/vencimiento/{id}", methods={"DELETE"})
     */
    public function delete()
    {
    	return "DELETE";
    }
}