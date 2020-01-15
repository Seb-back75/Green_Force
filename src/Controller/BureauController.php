<?php

namespace App\Controller;

use App\Entity\RechercheBureau;
use App\Form\RechercheBureauType;
use App\Repository\BureauRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BureauController extends AbstractController
{
    /**
     * @Route("/customer/bureaux", name="bureaux")
     */
    public function index(BureauRepository $repo,PaginatorInterface $paginatorInterface,Request $request)
    {
        //------ form recherche---------
       $rechercheBureau = new RechercheBureau();

       $form= $this->createForm(RechercheBureauType::class,$rechercheBureau);
       $form->handleRequest($request);

       //--------fin form recherche
        //--------paginator--------------
        $bureaux = $paginatorInterface->paginate(
            $repo->findPagination(),
            $request->query->getInt('page', 1),
            4
        );
      //---------fin paginator------------
       
     
        return $this->render('bureau/bureaux.html.twig',[
            "bureaux" => $bureaux,
            "form" => $form->createView(),
            "admin" => false
            
        ]);
    }
     //-----afficher details du produit----------------------
    /**
     * @Route("/customer/bureau/{id}", name="affichageBureau")
     */
    public function affichageDetailsBureaux(BureauRepository $repository,$id){
        $bureaux = $repository->find($id);
           
        return $this->render('bureau/afficherBureau.html.twig', [
            "bureau" => $bureaux
          
        ]);
    }
}
