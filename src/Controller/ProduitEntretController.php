<?php

namespace App\Controller;

use App\Entity\RecherchePapeterie;
use App\Form\RecherchePapeterieType;
use App\Repository\ProdEntretRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitEntretController extends AbstractController
{
    /**
     * @Route("/customer/produit/entretien", name="entretiens")
     */
    public function index(ProdEntretRepository $repository,PaginatorInterface $paginatorInterface,Request $request)
    {
         //------ form recherche---------
         $recherchePapeterie = new RecherchePapeterie();

         $form= $this->createForm(RecherchePapeterieType::class,$recherchePapeterie);
         $form->handleRequest($request);
         //--------paginator--------------
         $prodEntretiens = $paginatorInterface->paginate(
            $repository->findPagination(),
            $request->query->getInt('page', 1),
            4
        );
      //---------fin paginator------------

      
        return $this->render('produit_entret/produitEntret.html.twig', [
            "prodEntretiens" => $prodEntretiens,
            "form" => $form->createView(),
            "admin_entretien" => false
        ]);
    }

    //-----afficher details du produit----------------------
    /**
     * @Route("/customer/produit/entretien/{id}", name="affichage_prod")
     */
    public function affichageDetailsProduits(ProdEntretRepository $repositor,$id){
        $produits = $repositor->find($id);
           
        return $this->render('produit_entret/afficheProd.html.twig', [
            "produit" => $produits,
            
        ]);
    }

}
