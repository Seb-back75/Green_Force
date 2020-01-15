<?php

namespace App\Controller;


use App\Entity\Papeterie;
use App\Form\PapeterieType;
use App\Entity\RecherchePapeterie;
use App\Form\RecherchePapeterieType;
use App\Repository\PapeterieRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminPapeterieController extends AbstractController
{
    /**
     * @Route("/admin_papeterie", name="adpapeterie")
     */
    public function index(PapeterieRepository $repos,PaginatorInterface $paginatorInterface, Request $request)
    {
        //------ form recherche---------
    $recherchePapeterie = new RecherchePapeterie();

    $form= $this->createForm(RecherchePapeterieType::class,$recherchePapeterie);
    $form->handleRequest($request);


    $papeteries = $paginatorInterface->paginate(
        $repos->findPagination(),
        $request->query->getInt('page', 1),
        4
    );
  //---------fin paginator------------
  
    return $this->render('papeterie/papeteries.html.twig', [
        'papeteries' => $papeteries,
        "form" => $form->createView(),
        "admin_papeterie" => true
    ]);
}
    //-----afficher details du produit papeterie----------------------
        /**
         * @Route("/customer/papeterie/{id}", name="affichage_papeterie")
         */
        public function affichageDetailsPapeteries(PapeterieRepository $repos,$id){
            $papeteries = $repos->find($id);
            
            return $this->render('papeterie/afficherPapeterie.html.twig', [
                "papeteries" => $papeteries, 
            
            ]);
        }




     //----------gestion CRUD------------------------------------
      /**
     * @Route("/admin/papeterie/creation", name="creationPapeterie")
     * @Route("/admin/papeterie/{id}", name="modifPapeterie", methods="GET|POST")
     */
    public function modificationPapeterie(Papeterie $papeterie = null, Request $request)
    {
        $objectManager = $this->getDoctrine()->getManager();
        if(!$papeterie){
            $papeterie = new Papeterie();
        }
        
        $form = $this->createForm(PapeterieType::class,$papeterie);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $objectManager->persist($papeterie);
            $objectManager->flush();
            $this->addFlash('success', "L'action a été bien effectuée");
            return $this->redirectToRoute("admin_papeterie");
        }

        return $this->render('admin_papeterie/modifPapeterie.html.twig',[
            "papeterie" => $papeterie,
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/papeterie/{id}", name="supPapeterie", methods="SUP")
     */
    public function suppression(Papeterie $papeterie, Request $request){
        $objectManager = $this->getDoctrine()->getManager();
        if($this->isCsrfTokenValid("SUP".$papeterie->getId(), $request->get("_token"))){
            $objectManager->remove($papeterie);
            $objectManager->flush();
            $this->addFlash('success', "L'action a été bien effectuée");
            return $this->redirectToRoute("admin_papeterie");
        }
    }
}
