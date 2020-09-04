<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BancoController extends AbstractController
{
    /**
     * @Route("/banco", name="banco", methods={"GET", "HEAD"})
     */
    public function index()
    {
        return $this->render('pages/banco/index.html.twig', [
            'controller_name' => 'BancoController',
        ]);
    }

	/**
     * @Route("/banco/list", methods={"GET"})
     */
    public function list()
    {
    	return "LIST";
    }

    /**
     * @Route("/banco/{id}", methods={"GET"})
     */
    public function show()
    {
    	return "SHOW";
    }

    /**
     * @Route("/banco", methods={"POST"})
     */
    public function store()
    {
    	return "STORE";
    }

    /**
     * @Route("/banco/{id}", methods={"PUT"})
     */
    public function update()
    {
    	return "UPDATE";
    }

    /**
     * @Route("/banco/{id}", methods={"DELETE"})
     */
    public function delete()
    {
    	return "DELETE";
    }
}