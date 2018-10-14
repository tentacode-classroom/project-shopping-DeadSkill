<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BasketController extends AbstractController
{
    /**
     * @Route("/panier", name="basket")
     */
    public function index(SessionInterface $session)
    {
        $basketProducts = $session->get('basket_products', []);

        return $this->render('basket/index.html.twig', [
            'controller_name' => 'BasketController',
        ]);
    }
    /**
     * @Route("/panier/ajouter/{productId}", name="basket_add")
     */
    public function add(int $productId) {
        $basketProducts = $session->get('basket_products', []);
        $basketProducts[] = $productId;

        $session->set('basket_products', $basketProducts);

        return $this->redirectToRoute('basket_list');
    }
}
