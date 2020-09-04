<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ParticipantesController extends AbstractController
{
    /**
     * @Route("/participantes", name="participantes")
     */
    public function index()
    {
        return $this->render('pages/participantes/index.html.twig', [
            'controller_name' => 'ParticipantesController',
        ]);
    }
}
