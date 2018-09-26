<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ProductController extends AbstractController
{
    /**
     * @Route("/product/{idProduct}", name="idProduct")
     */
    public function index(int $idProduct)
    {
        $product = new Product();
        $product->id = $productId;
        $product->name = 'Toto';

        $kebab = [
            'banane',
            'pomme',
            'fraise',
        ];

        return $this->render('product/index.html.twig', [
        'product' => $product,
        'fruits' => $fruits
        ]);
    }
}

class Product
{
    public $id;
    public $name;
    public function upperName()
    {
        return strtoupper($this->name);
    }
}
