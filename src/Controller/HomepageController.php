<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Kebab;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {

        $kebabs = $this->getDoctrine()
        ->getRepository(Kebab::class)
        ->findAllOrderByPrice();

        return $this->render('homepage.html.twig', [
            'ekebabs' => $kebabs,
        ]);
    }

   
}
