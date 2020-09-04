<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ComprobanteController extends AbstractController
{
    /**
     * @Route("/comprobante", name="comprobante")
     */
    public function index()
    {
        return $this->render('pages/comprobante/index.html.twig', [
            'controller_name' => 'ComprobanteController',
        ]);
    }

	/**
     * @Route("/comprobante/list", methods={"GET"})
     */
    public function list()
    {
    	return "LIST";
    }

    /**
     * @Route("/comprobante/{id}", methods={"GET"})
     */
    public function show()
    {
    	return "SHOW";
    }

    /**
     * @Route("/comprobante", methods={"POST"})
     */
    public function store()
    {
    	return "STORE";
    }

    /**
     * @Route("/comprobante/{id}", methods={"PUT"})
     */
    public function update()
    {
    	return "UPDATE";
    }

    /**
     * @Route("/comprobante/{id}", methods={"DELETE"})
     */
    public function delete()
    {
    	return "DELETE";
    }
}