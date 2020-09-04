<?php
// ./src/Controller/RegistrationController

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/registration", name="registration")
     */
    public function index(Request $request)
    {
        $error  = false;
        $user   = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Encode the new users password
            $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPassword()));

            // Set their role
            $user->setRoles(['ROLE_USER']);
            $user->setActive(false);

            // Verifiy if the user exist
            $em = $this->getDoctrine()->getManager();
            $result = $em->getRepository(User::class)->findOneBy(['email' => $user->getEmail()]);

            if (!$result) {

                // Save
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                return $this->redirectToRoute('app_login');

            } else {
                
                $error = "El correo electrónico ya existe!";
            }

        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(), 'error' => $error
        ]);
    }
}