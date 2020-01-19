<?php

namespace App\Controller;

use App\Entity\Panier;
use App\Form\PanierType;
use App\Repository\PanierRepository;
use App\Service\Cart\CartService;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



/**
 * @Route("/panier")
 */
class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="cart_index")
     * * @Route("/", name="panier_index", methods={"GET"})
     */
    public function panierCommande(CartService $cartService)
    {  
        return $this->render('panier/index.html.twig', [
            'items' => $cartService->getFullCart(),
            'total' => $cartService->getTotal(),
            'connected'=>true,

        ]);
    }

    /**
     * @Route("/add/{id}", name="cart_add")
     */
    public function add($id, CartService $cartService)
    {                
        $cartService->add($id);

        return $this->redirectToRoute("panier_index");    
    }

      /**
     * @Route("/delete/{id}", name="cart_delete")
     */
    public function delete($id, CartService $cartService)
    {                
        $cartService->delete($id);

        return $this->redirectToRoute("panier_index");    
    }
/**
 * @Route("/remove/{id}", name="cart_remove")
 */
public function remove($id, CartService $cartService) 
{
            $cartService->remove($id);

            return $this->redirectToRoute("panier_index");
}
//    /**
//   * @Route("/new", name="panier_new", methods={"GET","POST"})
//   */
//     public function new(Request $request): Response
//  {
//          $commande = new Commande();
//          $form = $this->createForm(CommandeType::class, $commande);
//          $form->handleRequest($request);

//          if ($form->isSubmitted() && $form->isValid()) {
//              $entityManager = $this->getDoctrine()->getManager();
//              $entityManager->persist($commande);
//              $entityManager->flush();

//              return $this->redirectToRoute('commande_index');
//          }

//          return $this->render('commande/new.html.twig', [
//              'commande' => $commande,
//              'form' => $form->createView(),
//          ]);
//      }

     /**
      * @Route("/{id}", name="panier_show", methods={"GET"})
      */
     public function show(Panier $panier): Response
     {
         return $this->render('panier/show.html.twig', [
             'panier' => $panier,
         ]);
     }

     /**
      * @Route("/{id}/edit", name="panier_edit", methods={"GET","POST"})
      */
     public function edit(Request $request, Panier $panier): Response
     {
         $form = $this->createForm(PanierType::class, $panier);
         $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {
             $this->getDoctrine()->getManager()->flush();

             return $this->redirectToRoute('panier_index');
         }

         return $this->render('panier/edit.html.twig', [
             'panier' => $panier,
             'form' => $form->createView(),
         ]);
     }

    // /**
    //  * @Route("/{id}", name="commande_delete", methods={"DELETE"})
    //  */
    // public function delete(Request $request, Commande $commande): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$commande->getId(), $request->request->get('_token'))) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->remove($commande);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('commande_index');
    // }
}

