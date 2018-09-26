<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EkebabController extends AbstractController
{
    /**
     * @Route("/", name="ekebab")
     */
    public function index()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Kebab 1',
            ],
            [
                'id' => 2,
                'name' => 'Kebab 2',
            ],
            [
                'id' => 3,
                'name' => 'Kebab 3',
            ],
        ];


        return $this->render('ekebab/index.html.twig', [
            'products' => '$products',
        ]);
    }
}
