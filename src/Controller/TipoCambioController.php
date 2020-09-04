<?php

namespace App\Controller;

use App\Entity\TipoCambio;
use App\Form\TipoCambioType;
use App\Repository\TipoCambioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TipoCambioController extends AbstractController
{
    private $data = [
        'id' => 'tipo_cambio',
        'title' => 'Tipo Cambios',
        'titles' => 'Nuevo Tipo Cambio',
        'subtitle' => 'Agrege, modifique o elimine tipo de cambio...',
        'columns' => [
            '#',
            'Fecha',
            'Compra',
            'Venta',
            'Opciones'
        ]
    ];

    /**
     * @Route("/tipo_cambio", name="tipo_cambio")
     */
    public function index()
    {
        $form = $this->createForm(TipoCambioType::class, (new TipoCambio()));

        return $this->render('pages/tipo_cambio/index.html.twig', [
            'controller_name' => 'TipoCambioController',
            'data' => $this->data,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/tipo_cambio/list", methods={"GET"})
     * @param Request $request
     * @param TipoCambioRepository $tipocambio
     * @return Response
     */
    public function list(Request $request, TipoCambioRepository $tipocambio): Response
    {
        if ($request->isXmlHttpRequest()) {

            return $this->json([
                'status' => 'success',
                'data' => $tipocambio->findAll(),
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/tipo_cambio/{id}", methods={"GET"})
     * @param Request $request
     * @param TipoCambio $tipocambio
     * @return Response
     */
    public function show(Request $request, TipoCambio $tipocambio): Response
    {
        if ($request->isXmlHttpRequest()) {

            return $this->json([
                'status' => 'success',
                'data' => $tipocambio
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/tipo_cambio/store", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->beginTransaction();
            try {
                $tipocambio = new TipoCambio();
                $tipocambio->setFecha(\DateTime::createFromFormat('Y-m-d', $request->get('fecha')));
                $tipocambio->setCompra($request->get('compra'));
                $tipocambio->setVenta($request->get('venta'));

                $em->persist($tipocambio);
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
                'data' => $tipocambio,
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/tipo_cambio/{id}", methods={"PUT"})
     * @param Request $request
     * @param TipoCambio $tipocambio
     * @return Response
     */
    public function update(Request $request, TipoCambio $tipocambio): Response
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->beginTransaction();
            try {
                $tipocambio->setFecha($request->get('fecha'));
                $tipocambio->setCompra($request->get('compra'));
                $tipocambio->setVenta($request->get('venta'));

                $em->persist($tipocambio);
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
                'data' => $tipocambio,
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/tipo_cambio/{id}", methods={"DELETE"})
     * @param Request $request
     * @param TipoCambio $tipocambio
     * @return Response
     */
    public function delete(Request $request, TipoCambio $tipocambio): Response
    {
        if ($request->isXmlHttpRequest()) {
            $tipocambio->setEstado(false);

            $em = $this->getDoctrine()->getManager();
            $em->persist($tipocambio);
            $em->flush();

            return $this->json([
                'status' => 'success',
                'data' => $tipocambio,
            ]);
        }
        return $this->json(0);
    }
}
