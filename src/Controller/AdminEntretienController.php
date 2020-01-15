<?php

namespace App\Controller;

use App\Entity\ProdEntret;
use App\Form\EntretienType;
use App\Entity\RecherchePapeterie;
use App\Form\RecherchePapeterieType;
use App\Repository\ProdEntretRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminEntretienController extends AbstractController
{
    
    /**
     * @Route("/admin_entretien", name="adentretien")
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
             "admin_entretien" => true
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



    //----------gestion CRUD------------------------------------

     /**
     * @Route("/admin/entretien/creation", name="creationEntretien")
     * @Route("/admin/entretien/{id}", name="modifEntretien", methods="GET|POST")
     */
    public function modification(ProdEntret $prodEntretiens = null, Request $request){
        $objectManager = $this->getDoctrine()->getManager();
        if(!$prodEntretiens){
            $prodEntretiens = new ProdEntret();
        }
        
        $form = $this->createForm(EntretienType::class,$prodEntretiens);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $objectManager->persist($prodEntretiens);
            $objectManager->flush();
            $this->addFlash('success', "L'action a été effectué");
            return $this->redirectToRoute("admin_entretien");
        }

        return $this->render('admin_entretien/modifEntretien.html.twig',[
            "prodEntretiens" => $prodEntretiens,
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/entretien/{id}", name="supEntretien", methods="SUP")
     */
    public function suppression(ProdEntret $prodEntretiens, Request $request){
        $objectManager = $this->getDoctrine()->getManager();
        if($this->isCsrfTokenValid("SUP".$prodEntretiens->getId(), $request->get("_token"))){
            $objectManager->remove($prodEntretiens);
            $objectManager->flush();
            $this->addFlash('success', "L'action a été effectué");
            return $this->redirectToRoute("admin_entretien");
        }
    }
}
