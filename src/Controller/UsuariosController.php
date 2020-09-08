<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\DBAL\Driver\Connection;
use App\Service\SrvUsuarios;

class UsuariosController extends AbstractController
{
    /**
     * @Route("/usuarios", name="usuarios")
     */
    public function index()
    {

    	$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('usuarios/index.html.twig', [
            'controller_name' => 'UsuariosController',
        ]);
    }

    /**
     * @Route("/usuarios/json/records", name="usuarios_json_records")
     */
    public function usuarios_json_records(Connection $connection)
    {

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $vulnerabilities_by_domain = SrvUsuarios::query_all($connection);

        $response = new JsonResponse($vulnerabilities_by_domain);
        
        // Use the JSON_PRETTY_PRINT 
        $response->setEncodingOptions( $response->getEncodingOptions() | JSON_PRETTY_PRINT );
        
        return $response;

    }

}
