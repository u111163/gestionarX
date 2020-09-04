<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PagoController extends AbstractController
{
    /**
     * @Route("/pago", name="pago")
     */
    public function index()
    {
        return $this->render('pages/pago/index.html.twig', [
            'controller_name' => 'PagoController',
        ]);
    }

	/**
     * @Route("/pago/list", methods={"GET"})
     */
    public function list()
    {
    	return "LIST";
    }

    /**
     * @Route("/pago/{id}", methods={"GET"})
     */
    public function show()
    {
    	return "SHOW";
    }

    /**
     * @Route("/pago", methods={"POST"})
     */
    public function store()
    {
    	return "STORE";
    }

    /**
     * @Route("/pago/{id}", methods={"PUT"})
     */
    public function update()
    {
    	return "UPDATE";
    }

    /**
     * @Route("/pago/{id}", methods={"DELETE"})
     */
    public function detele()
    {
    	return "DELETE";
    }
}