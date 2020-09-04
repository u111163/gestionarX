<?php

namespace App\Controller;

use App\Entity\TipoComprobante;
use App\Form\TipoComprobanteType;
use App\Repository\TipoComprobanteRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TipoComprobanteController extends AbstractController
{
    private $data = [
        'id' => 'tipo_comprobante',
        'title' => 'Tipo Comprobantes',
        'titles' => 'Nuevo Tipo Comprobante',
        'subtitle' => 'Agrege, modifique o elimine tipo de comprobante...',
        'columns' => [
            '#',
            'Codigo',
            'Nombre',
            'Opciones'
        ]
    ];

    private $tipo_comprobante;
    
    public function __construct()
    {
        //$this->empresa = new \EmpresaService($this->getDoctrine()->getManager(), Empresa::class);
    }
    
    /**
     * @Route("/tipo_comprobante", name="tipo_comprobante")
     */
    public function index()
    {
        $form = $this->createForm(TipoComprobanteType::class, (new TipoComprobante()));
        
        return $this->render('pages/tipo_comprobante/index.html.twig', [
            'controller_name' => 'TipoComprobanteController',
            'data' => $this->data,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/tipo_comprobante/list", methods={"GET"})
     * @param Request $request
     * @param TipoComprobanteRepository $tipocomprobante
     * @return Response
     */
    public function list(Request $request, TipoComprobanteRepository $tipocomprobante): Response
    {
        if ($request->isXmlHttpRequest()) {

            return $this->json([
                'status' => 'success',
                'data' => $tipocomprobante->findAll(),
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/tipo_comprobante/{id}", methods={"GET"})
     * @param Request $request
     * @param TipoComprobante $tipocomprobante
     * @return Response
     */
    public function show(Request $request, TipoComprobante $tipocomprobante): Response
    {
        if ($request->isXmlHttpRequest()) {

            return $this->json([
                'status' => 'success',
                'data' => $tipocomprobante
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/tipo_comprobante/store", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->beginTransaction();
            try {
                $tipocomprobante = new TipoComprobante();
                $tipocomprobante->setCodigo($request->get('codigo'));
                $tipocomprobante->setNombre($request->get('nombre'));

                $em->persist($tipocomprobante);
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
                'data' => $tipocomprobante,
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/tipo_comprobante/{id}", methods={"PUT"})
     * @param Request $request
     * @param TipoComprobante $tipocomprobante
     * @return Response
     */
    public function update(Request $request, TipoComprobante $tipocomprobante): Response
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->beginTransaction();
            try {
                $tipocomprobante->setCodigo($request->get('codigo'));
                $tipocomprobante->setNombre($request->get('nombre'));

                $em->persist($tipocomprobante);
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
                'data' => $tipocomprobante,
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/tipo_comprobante/{id}", methods={"DELETE"})
     * @param Request $request
     * @param TipoComprobante $tipocomprobante
     * @return Response
     */
    public function delete(Request $request, TipoComprobante $tipocomprobante): Response
    {
        if ($request->isXmlHttpRequest()) {
            $tipocomprobante->setEstado(false);

            $em = $this->getDoctrine()->getManager();
            $em->persist($tipocomprobante);
            $em->flush();

            return $this->json([
                'status' => 'success',
                'data' => $tipocomprobante,
            ]);
        }
        return $this->json(0);
    }
}