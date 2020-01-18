<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Form\CommandeType;
use App\Repository\CommandeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/commande")
 */
class CommandeController extends AbstractController
{
    /**
     * @Route("/panier", name="cart_index")
     * * @Route("/", name="commande_index", methods={"GET"})
     */
    public function panierCommande(SessionInterface $session,CommandeRepository $commandeRepository){

        $panier = $session->get('panier',[]);
        $panierData = [];
        foreach($panier as $id => $quantity){
            $product = $commandeRepository->find($id);

            if (!$product) {
                continue;
            }

            $panierData[] = [
                'product' => $product,
                'quantity' => $quantity
            ];
        }
         $total = 0;

        foreach($panierData as $item){
            $totalItem = $item['product']->getTttc() * $item['quantity'];
            $total += $totalItem;
        }
        
        return $this->render('commande/index.html.twig', [
            'items'=> $panierData,
            'total'=> $total
        ]);
    }

 /**
     * @Route("/panier/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session){
                
            $panier = $session->get('panier',[]);
            if(!empty($panier[$id])){
                $panier[$id]++;
            }else{
            $panier[$id] = 1;
            }
            $session->set('panier', $panier);
          
            return $this->redirectToRoute("commande_index");
        

    
}
/**
 * @Route("/panier/remove/{id}", name="cart_remove")
 */
public function remove($id, SessionInterface $session) {
            $panier = $session->get('panier',[]);

            if(!empty($panier[$id])){
                unset($panier[$id]);
            }

            $session->set('panier', $panier);

            return $this->redirectToRoute("commande_index");
}
//    /**
//   * @Route("/new", name="commande_new", methods={"GET","POST"})
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
      * @Route("/{id}", name="commande_show", methods={"GET"})
      */
     public function show(Commande $commande): Response
     {
         return $this->render('commande/show.html.twig', [
             'commande' => $commande,
         ]);
     }

     /**
      * @Route("/{id}/edit", name="commande_edit", methods={"GET","POST"})
      */
     public function edit(Request $request, Commande $commande): Response
     {
         $form = $this->createForm(CommandeType::class, $commande);
         $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {
             $this->getDoctrine()->getManager()->flush();

             return $this->redirectToRoute('commande_index');
         }

         return $this->render('commande/edit.html.twig', [
             'commande' => $commande,
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

