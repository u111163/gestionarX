<?php

namespace App\Controller;

use App\Entity\Registro;
use App\Form\RegistroType;
use App\Repository\RegistroRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistroController extends AbstractController
{
    private $data = [
        'id' => 'registro',
        'title' => 'Registro',
        'titles' => 'Nuevo Registro',
        'subtitle' => 'Agrege, modifique o elimine registro...',
        'columns' => [
            '#',
            'Nombre',
            'Opciones'
        ]
    ];
    
    private $registro;
    
    public function __construct()
    {
        //$this->empresa = new \EmpresaService($this->getDoctrine()->getManager(), Empresa::class);
    }
    
    /**
     * @Route("/registro", name="registro")
     */
    public function index()
    {
        $form = $this->createForm(RegistroType::class, (new Registro()));
        
        return $this->render('pages/registro/index.html.twig', [
            'controller_name' => 'RegistroController',
            'data' => $this->data,
            'form' => $form->createView(),
        ]);
    }

	/**
     * @Route("/registro/list", methods={"GET"})
     */
    public function list(Request $request, RegistroRepository $registro): Response
    {
        if ($request->isXmlHttpRequest()) {

            return $this->json([
                'status' => 'success',
                'data' => $registro->findAll(),
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/registro/{id}", methods={"GET"})
     */
    public function show(Request $request, Registro $registro): Response
    {
        if ($request->isXmlHttpRequest()) {

            return $this->json([
                'status' => 'success',
                'data' => $registro
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/registro/store", methods={"POST"})
     */
    public function store(Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->beginTransaction();
            try {
                $registro = new Registro();
                $registro->setNombre($request->get('nombre'));

                $em->persist($registro);
                $em->flush();
                $em->getConnection()->commit();
            } catch (Exception $e) {
                $em->getConnection()->rollBack();
                return $this->json([
                    'status' => 'error'
                ]);
            }
            return $this->json([
                'status' => 'success',
                'data' => $registro,
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/registro/{id}", methods={"PUT"})
     */
    public function update(Request $request, Registro $registro): Response
    {
    	if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->beginTransaction();
            try {
                $registro->setNombre($request->get('nombre'));

                $em->persist($registro);
                $em->flush();
                $em->getConnection()->commit();
            } catch (Exception $e) {
                $em->getConnection()->rollBack();
                return $this->json([
                    'status' => 'error'
                ]);
            }
            return $this->json([
                'status' => 'success',
                'data' => $registro,
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/registro/{id}", methods={"DELETE"})
     */
    public function delete(Request $request, Registro $registro): Response
    {
        if ($request->isXmlHttpRequest()) {
            $registro->setEstado(false);

            $em = $this->getDoctrine()->getManager();
            $em->persist($registro);
            $em->flush();

            return $this->json([
                'status' => 'success',
                'data' => $registro,
            ]);
        }
        return $this->json(0);
    }
}