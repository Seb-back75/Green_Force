<?php

namespace App\Controller;

use App\Entity\Bureau;
use App\Form\BureauType;
use App\Entity\RechercheBureau;
use App\Form\RechercheBureauType;
use App\Repository\BureauRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(BureauRepository $repo,PaginatorInterface $paginatorInterface, Request $request)
    {
        $rechercheBureau = new RechercheBureau();

        $form = $this->createForm(RechercheBureauType::class,$rechercheBureau);
        $form->handleRequest($request);

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
            "admin" => true
        ]);
    }
       /**
     * @Route("/admin/creation", name="creationBureau")
     * @Route("/admin/{id}", name="modifBureau", methods="GET|POST")
     */
    public function modification(Bureau $bureau = null, Request $request){
        $objectManager = $this->getDoctrine()->getManager();
        if(!$bureau){
            $bureau = new Bureau();
        }
        
        $form = $this->createForm(BureauType::class,$bureau);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $objectManager->persist($bureau);
            $objectManager->flush();
            $this->addFlash('success', "L'action a été effectué");
            return $this->redirectToRoute("admin");
        }

        return $this->render('admin/modification.html.twig',[
            "bureau" => $bureau,
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/{id}", name="supBureau", methods="SUP")
     */
    public function suppression(Bureau $bureau, Request $request){
        $objectManager = $this->getDoctrine()->getManager();
        if($this->isCsrfTokenValid("SUP".$bureau->getId(), $request->get("_token"))){
            $objectManager->remove($bureau);
            $objectManager->flush();
            $this->addFlash('success', "L'action a été effectué");
            return $this->redirectToRoute("admin");
        }
    }
}
