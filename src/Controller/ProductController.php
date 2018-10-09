<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Kebab;


class ProductController extends AbstractController
{
    /**
     * @Route("/product/{idProduct}", name="product")
     */

    public function show($idProduct)
{
    $kebab = $this->getDoctrine()
        ->getRepository(Kebab::class)
        ->find($idProduct);

        return $this->render('product.html.twig', [
            'ekebab' => $kebab,
        ]);

}
}