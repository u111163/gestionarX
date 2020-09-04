<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PersonalController extends AbstractController
{
    /**
     * @Route("/personal", name="personal")
     */
    public function index()
    {
        return $this->render('pages/personal/index.html.twig', [
            'controller_name' => 'PersonalController',
        ]);
    }

	/**
     * @Route("/personal/list", methods={"GET"})
     */
    public function list()
    {
    	return "LIST";
    }

    /**
     * @Route("/personal/{id}", methods={"GET"})
     */
    public function show()
    {
    	return "SHOW";
    }

    /**
     * @Route("/personal", methods={"POST"})
     */
    public function store()
    {
    	return "STORE";
    }

    /**
     * @Route("/personal/{id}", methods={"PUT"})
     */
    public function update()
    {
    	return "UPDATE";
    }

    /**
     * @Route("/personal/{id}", methods={"DELETE"})
     */
    public function detele()
    {
    	return "DELETE";
    }
}