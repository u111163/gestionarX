<?php

namespace App\Controller;

use App\Entity\Empresa;
use App\Form\EmpresaType;
use App\Repository\EmpresaRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmpresaController extends AbstractController
{
    private $data = [
        'id' => 'empresa',
        'title' => 'Empresas',
        'titles' => 'Nueva Empresa',
        'subtitle' => 'Agrege, modifique o elimine empresas...',
        'columns' => [
            '#',
            'Distrito',
            'RUC',
            'Razon Social',
            'Direccion',
            'Teléfono',
            'Opciones'
        ]
    ];

    public function __construct()
    {
        //$this->empresa = new \App\Service\EmpresaService($this->getDoctrine()->getManager(), Empresa::class);
    }

    /**
     * @Route("/empresa", name="empresa")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(EmpresaType::class, (new Empresa()));


        return $this->render('pages/empresa/index.html.twig', [
            'controller_name' => 'EmpresaController',
            'data' => $this->data,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/empresa/list", methods={"GET"})
     * @param Request $request
     * @param EmpresaRepository $empresas
     * @return Response
     */
    public function list(Request $request, EmpresaRepository $empresas): Response
    {
        if ($request->isXmlHttpRequest()) {

            return $this->json([
                'status' => 'success',
                'data' => $empresas->findAll(),
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/empresa/{id}", methods={"GET"})
     * @param Request $request
     * @param Empresa $empresa
     * @return Response
     */
    public function show(Request $request, Empresa $empresa): Response
    {
        if ($request->isXmlHttpRequest()) {

            return $this->json([
                'status' => 'success',
                'data' => $empresa
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/empresa/store", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->beginTransaction();
            try {
                $empresa = new Empresa();
                $empresa->setUbigeo($request->get('ubigeo'));
                $empresa->setRuc($request->get('ruc'));
                $empresa->setRazonsoc($request->get('razonsoc'));
                $empresa->setDireccion($request->get('direccion'));
                $empresa->setTelf($request->get('telf'));
                $empresa->setEmail($request->get('email'));

                $em->persist($empresa);
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
                'data' => $empresa,
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/empresa/{id}", methods={"PUT"})
     * @param Request $request
     * @param Empresa $empresa
     * @return Response
     */
    public function update(Request $request, Empresa $empresa): Response
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->beginTransaction();
            try {
                $empresa->setUbigeo($request->get('ubigeo'));
                $empresa->setRuc($request->get('ruc'));
                $empresa->setRazonsoc($request->get('razonsoc'));
                $empresa->setDireccion($request->get('direccion'));
                $empresa->setTelf($request->get('telf'));
                $empresa->setEmail($request->get('email'));

                $em->persist($empresa);
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
                'data' => $empresa,
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/empresa/{id}", methods={"DELETE"})
     * @param Request $request
     * @param Empresa $empresa
     * @return Response
     */
    public function delete(Request $request, Empresa $empresa): Response
    {
        if ($request->isXmlHttpRequest()) {
            $empresa->setEstado(false);

            $em = $this->getDoctrine()->getManager();
            $em->persist($empresa);
            $em->flush();

            return $this->json([
                'status' => 'success',
                'data' => $empresa,
            ]);
        }
        return $this->json(0);
    }
}
