<?php

namespace App\Controller;

use App\Entity\FormaPago;
use App\Form\FormaPagoType;
use App\Repository\FormaPagoRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormaPagoController extends AbstractController
{
    private $data = [
        'id' => 'forma_pago',
        'title' => 'Forma Pagos',
        'titles' => 'Nueva Forma Pago',
        'subtitle' => 'Agrege, modifique o elimine forma de pagos...',
        'columns' => [
            '#',
            'Nombre',
            'Opciones'
        ]
    ];

    private $forma_pago;
    
    public function __construct()
    {
        //$this->empresa = new \EmpresaService($this->getDoctrine()->getManager(), Empresa::class);
    }
    
    /**
     * @Route("/forma_pago", name="forma_pago")
     */
    public function index()
    {
        $form = $this->createForm(FormaPagoType::class, (new FormaPago()));
        
        return $this->render('pages/forma_pago/index.html.twig', [
            'controller_name' => 'FormaPagoController',
            'data' => $this->data,
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/forma_pago/list", methods={"GET"})
     */
    public function list(Request $request, FormaPagoRepository $formapago): Response
    {
        if ($request->isXmlHttpRequest()) {

            return $this->json([
                'status' => 'success',
                'data' => $formapago->findAll(),
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/forma_pago/{id}", methods={"GET"})
     */
    public function show(Request $request, FormaPago $formapago): Response
    {
        if ($request->isXmlHttpRequest()) {

            return $this->json([
                'status' => 'success',
                'data' => $formapago
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/forma_pago/store", methods={"POST"})
     */
    public function store(Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->beginTransaction();
            try {
                $formapago = new FormaPago();
                $formapago->setNombre($request->get('nombre'));

                $em->persist($formapago);
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
                'data' => $formapago,
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/forma_pago/{id}", methods={"PUT"})
     */
    public function update(Request $request, FormaPago $formapago): Response
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->beginTransaction();
            try {
                $formapago->setNombre($request->get('nombre'));

                $em->persist($formapago);
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
                'data' => $formapago,
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/forma_pago/{id}", methods={"DELETE"})
     */
    public function delete(Request $request, FormaPago $formapago): Response
    {
        if ($request->isXmlHttpRequest()) {
            $formapago->setEstado(false);

            $em = $this->getDoctrine()->getManager();
            $em->persist($formapago);
            $em->flush();

            return $this->json([
                'status' => 'success',
                'data' => $formapago,
            ]);
        }
        return $this->json(0);
    }
}