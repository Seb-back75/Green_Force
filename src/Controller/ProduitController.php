<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produit")
 */
class ProduitController extends AbstractController
{
    /**
     * @Route("/equipement", name="equipement_index", methods={"GET"})
     */
    public function indexE(ProduitRepository $produitRepository): Response
    {
        return $this->render('produit/index.html.twig', [
            'produits' => $produitRepository->findByCategorieField('Equipement'),
            'categorie' =>('Equipements'),
        ]);
    }

    /**
     * @Route("/entretien", name="entretien_index", methods={"GET"})
     */
    public function indexEn(ProduitRepository $produitRepository): Response
    {
        return $this->render('produit/index.html.twig', [
            'produits' => $produitRepository->findByCategorieField('entretien'),
            'categorie' =>('Produits d\'entretien'),
        ]);
    }

    /**
     * @Route("/papeterie", name="papeterie_index", methods={"GET"})
     */
    public function indexP(ProduitRepository $produitRepository): Response
    {
        return $this->render('produit/index.html.twig', [
            'produits' => $produitRepository->findByCategorieField('papeterie'),
            'categorie' =>('Papeterie'),
        ]);
    }
    

    /**
     * @Route("/new", name="produit_new", methods={"GET","POST"})
     */
    public function new(ProduitRepository $produitRepository, Request $request): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produit);
            $entityManager->flush();

            $this->addFlash('notice', 'Votre produit '.$produit->getLibelle().' a été ajouté !!'); 

            if ($produit->getCategorie() == "Papeterie"){
                return $this->redirectToRoute('papeterie_index');

            }
            if ($produit->getCategorie() == "Entretien"){
                return $this->redirectToRoute('entretien_index');

            }
            if ($produit->getCategorie() == "Equipement"){
                return $this->redirectToRoute('equipement_index');

            }
        }

        return $this->render('produit/new.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produit_show", methods={"GET"})
     */
    public function show(Produit $produit): Response
    {
        return $this->render('produit/show.html.twig', [
            'produit' => $produit,
        ]);
    }
  

    /**
     * @Route("/{id}/edit", name="produit_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Produit $produit): Response
    {
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('notice', 'Votre produit '.$produit->getLibelle().' a bien été modifié !!'); 

            if ($produit->getCategorie() == "Papeterie"){
                return $this->redirectToRoute('papeterie_index');
    
            }
            if ($produit->getCategorie() == "Entretien"){
                return $this->redirectToRoute('entretien_index');
    
            }
            if ($produit->getCategorie() == "Equipement"){
                return $this->redirectToRoute('equipement_index');
    
            }
        }

        return $this->render('produit/edit.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produit_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Produit $produit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($produit);
            $entityManager->flush();
        }

<<<<<<< HEAD
            $this->addFlash('supp', 'Votre produit '.$produit->getLibelle().' a bien été supprimé !!'); 

        if ($produit->getCategorie() == "Papeterie"){
            return $this->redirectToRoute('papeterie_index');

        }
        if ($produit->getCategorie() == "Entretien"){
            return $this->redirectToRoute('entretien_index');

        }
        if ($produit->getCategorie() == "Equipement"){
            return $this->redirectToRoute('equipement_index');

        }
        
=======
        return $this->redirectToRoute('/equipement_index');
>>>>>>> 31d51fb08c47162c4cedcc01de2c7beaa086fc70
    }
}
