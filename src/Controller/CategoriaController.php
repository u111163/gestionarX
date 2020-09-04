<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Form\CategoriaType;
use App\Repository\CategoriaRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriaController extends AbstractController
{
    private $data = [
        'id' => 'categoria',
        'title' => 'Categorias',
        'titles' => 'Nueva Categoría',
        'subtitle' => 'Agrege, modifique o elimine una categoría...',
        'columns' => [
            '#',
            'Fecha',
            'Compra',
            'Venta',
            'Opciones'
        ]
    ];

    /**
     * @Route("/categoria", name="categoria")
     */
    public function index()
    {
        $form = $this->createForm(CategoriaType::class, (new Categoria()));

        return $this->render('pages/categoria/index.html.twig', [
            'controller_name' => 'CategoriaController',
            'data' => $this->data,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/categoria/list", methods={"GET"})
     * @param Request $request
     * @param CategoriaRepository $categoria
     * @return Response
     */
    public function list(Request $request, CategoriaRepository $categoria): Response
    {
        if ($request->isXmlHttpRequest()) {

            return $this->json([
                'status' => 'success',
                'data' => $categoria->findAll(),
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/categoria/{id}", methods={"GET"})
     * @param Request $request
     * @param Categoria $categoria
     * @return Response
     */
    public function show(Request $request, Categoria $categoria): Response
    {
        if ($request->isXmlHttpRequest()) {

            return $this->json([
                'status' => 'success',
                'data' => $categoria
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/categoria/store", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->beginTransaction();
            try {
                $categoria = new Categoria();
                $categoria->setNombre($request->get('nombre'));

                $em->persist($categoria);
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
                'data' => $categoria,
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/categoria/{id}", methods={"PUT"})
     * @param Request $request
     * @param Categoria $categoria
     * @return Response
     */
    public function update(Request $request, Categoria $categoria): Response
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->beginTransaction();
            try {
                $categoria->setNombre($request->get('nombre'));

                $em->persist($categoria);
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
                'data' => $categoria,
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/categoria/{id}", methods={"DELETE"})
     * @param Request $request
     * @param Categoria $categoria
     * @return Response
     */
    public function delete(Request $request, Categoria $categoria): Response
    {
        if ($request->isXmlHttpRequest()) {
            $categoria->setEstado(false);

            $em = $this->getDoctrine()->getManager();
            $em->persist($categoria);
            $em->flush();

            return $this->json([
                'status' => 'success',
                'data' => $categoria,
            ]);
        }
        return $this->json(0);
    }
}