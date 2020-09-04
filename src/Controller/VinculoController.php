<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VinculoController extends AbstractController
{
    /**
     * @Route("/vinculo", name="vinculo")
     */
    public function index()
    {
        return $this->render('pages/vinculo/index.html.twig', [
            'controller_name' => 'VinculoController',
        ]);
    }

	/**
     * @Route("/vinculo/list", methods={"GET"})
     */
    public function list()
    {
    	return "LIST";
    }

    /**
     * @Route("/vinculo/{id}", methods={"GET"})
     */
    public function show()
    {
    	return "SHOW";
    }

    /**
     * @Route("/vinculo", methods={"POST"})
     */
    public function store()
    {
    	return "STORE";
    }

    /**
     * @Route("/vinculo/{id}", methods={"PUT"})
     */
    public function update()
    {
    	return "UPDATE";
    }

    /**
     * @Route("/vinculo/{id}", methods={"DELETE"})
     */
    public function delete()
    {
    	return "DELETE";
    }
}