<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Service\Cart\CartSevice;
use App\Form\CommandeType;
use App\Repository\CommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    /**
     * @Route("/panier", name="commande_index", methods={"GET"})
     */
    public function index(CartService $cartService)
    {
         return $this->render('commande/index.html.twig', [
            'items' => $cartService->getFullCart();
            'total' => $cartService->getTotal();
        ]);
    }

   /**
    * @Route("/panier/add/{id}", name="commande_add")
    */
    public function add($id, CartService $cartService)
    {
         $cartService->add($id);

         return $this->redirectToRoute('commande_index');
    }

   /**
    * @Route("/panier/remove/{id}", name="commande_remove")
    */
    public function remove($id, CartService $cartService){

         $cartService->remove($id);   
      
         return $this->redirectToRoute('commande_index');
    }
}


   