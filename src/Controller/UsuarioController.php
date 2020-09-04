<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Form\UsuarioType;
use App\Repository\UsuarioRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioController extends AbstractController
{
    private $data = [
        'id' => 'usuario',
        'title' => 'Usuarios',
        'titles' => 'Nuevo Usuario',
        'subtitle' => 'Agrege, modifique o elimine usuarios...',
        'columns' => [
            '#',
            'DNI',
            'Nombres',
            'Login',
            'Perfil',
            'Opciones'
        ]
    ];


    public function __construct()
    {
        //$this->empresa = new \EmpresaService($this->getDoctrine()->getManager(), Empresa::class);
    }
    /**
     * @Route("/usuario", name="usuario")
     */
    public function index()
    {
        $form = $this->createForm(UsuarioType::class, (new Usuario()));
        
        return $this->render('pages/usuario/index.html.twig', [
            'controller_name' => 'UsuarioController',
            'data' => $this->data,
            'form' => $form->createView(),
        ]);
    }

	/**
     * @Route("/usuario/list", methods={"GET"})
     */
    public function list(Request $request, UsuarioRepository $usuarios): Response
    {
        if ($request->isXmlHttpRequest()) {

            return $this->json([
                'status' => 'success',
                'data' => $usuarios->findAll(),
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/usuario/{id}", methods={"GET"})
     */
    public function show(Request $request, Usuario $usuario): Response
    {
        if ($request->isXmlHttpRequest()) {

            return $this->json([
                'status' => 'success',
                'data' => $usuario
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/usuario/store", methods={"POST"})
     */
    public function store(Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->beginTransaction();
            try {
                $usuario = new Usuario();
                $usuario->setTipoUsuarioId($request->get('tipo_usuario_id'));
                $usuario->setEmpresaId($request->get('empresa_id'));
                $usuario->setDni($request->get('dni'));
                $usuario->setNombres($request->get('nombres'));
                $usuario->setLogin($request->get('login'));
                $usuario->setPassword($request->get('password'));

                $em->persist($usuario);
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
                'data' => $usuario,
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/usuario/{id}", methods={"PUT"})
     */
    public function update(Request $request, Usuario $usuario): Response
    {
    	if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->beginTransaction();
            try {
                $usuario->setTipoUsuarioId($request->get('tipo_usuario_id'));
                $usuario->setEmpresaId($request->get('empresa_id'));
                $usuario->setDni($request->get('dni'));
                $usuario->setNombres($request->get('nombres'));
                $usuario->setLogin($request->get('login'));
                $usuario->setPassword($request->get('password'));

                $em->persist($usuario);
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
                'data' => $usuario,
            ]);
        }
        return $this->json(0);
    }

    /**
     * @Route("/usuario/{id}", methods={"DELETE"})
     */
    public function delete(Request $request, Usuario $usuario): Response
    {
        if ($request->isXmlHttpRequest()) {
            $usuario->setEstado(false);

            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();

            return $this->json([
                'status' => 'success',
                'data' => $usuario,
            ]);
        }
        return $this->json(0);
    }
}