<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use App\Entity\User;
use App\Entity\Upload;
use App\Form\UploadType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/inscription", name="registration")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder)
    {

        
        $upload = new Upload();
        $form = $this->createForm(UploadType::class, $upload);
        $user = new User();
        $form = $this->createFormBuilder($user)
            ->add('firstname', TextType::class, [
                'label' => 'Prénom'
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class, [
                'label' => 'Mot de Passe'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'S inscrire'
            ])
            //->add('file', FileType::class, [
                //'label' => 'Envoyer'
           // ])
            ->getForm();
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $plainPassword = $user->getPassword();
            $encryptedPassword = $encoder->encodePassword($user, $plainPassword);
            $user->setPassword($encryptedPassword);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
           // return $this->redirectToRoute('homepage.html.twig');
        }
        return $this->render('registration.html.twig', [
            'form' => $form->createView(),
        ]);

        return $this->render('registration.html.twig', [
            'RegistrationController' => 'RegistrationController',
        ]);

    }

    //public function homepage() 
    //{
        
        

        //return $this->render('registration.html.twig', array(
            //'form' => $form->createView(),
        //));
    //}
}
