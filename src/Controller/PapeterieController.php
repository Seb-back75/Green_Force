<?php

namespace App\Controller;


use App\Entity\RecherchePapeterie;
use App\Form\RecherchePapeterieType;
use App\Repository\PapeterieRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PapeterieController extends AbstractController
{
    /**
     * @Route("/customer/papeteries", name="papeteries")
     */
    public function index(PapeterieRepository $repos,PaginatorInterface $paginatorInterface,Request $request)
    {
            //------ form recherche---------
        $recherchePapeterie = new RecherchePapeterie();

        $formP= $this->createForm(RecherchePapeterieType::class,$recherchePapeterie);
        $formP->handleRequest($request);


        $papeteries = $paginatorInterface->paginate(
            $repos->findPagination(),
            $request->query->getInt('page', 1),
            4
        );
      //---------fin paginator------------
      
        return $this->render('papeterie/papeteries.html.twig', [
            'papeteries' => $papeteries,
            "formP" => $formP->createView(),
            "admin_papeterie" => false
        ]);
    }
     //-----afficher details papeterie----------------------
    /**
     * @Route("/customer/produit/papeterie/{id}", name="affichage_papeterie")
     */
    public function affichageDetailsPapeterie(PapeterieRepository $repository,$id){
        $papet = $repository->find($id);
           
        return $this->render('papeterie/afficherPapeterie.html.twig', [
            "papeteries" => $papet
          
        ]);
    }
}
