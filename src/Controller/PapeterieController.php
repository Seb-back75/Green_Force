<?php

namespace App\Controller;

use App\Entity\Papeterie;
use App\Form\PapeterieType;
use App\Repository\PapeterieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/papeterie")
 */
class PapeterieController extends AbstractController
{
    /**
     * @Route("/", name="papeterie_index", methods={"GET"})
     */
    public function index(PapeterieRepository $papeterieRepository): Response
    {
        return $this->render('papeterie/index.html.twig', [
            'papeteries' => $papeterieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="papeterie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $papeterie = new Papeterie();
        $form = $this->createForm(PapeterieType::class, $papeterie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($papeterie);
            $entityManager->flush();

            return $this->redirectToRoute('papeterie_index');
        }

        return $this->render('papeterie/new.html.twig', [
            'papeterie' => $papeterie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="papeterie_show", methods={"GET"})
     */
    public function show(Papeterie $papeterie): Response
    {
        return $this->render('papeterie/show.html.twig', [
            'papeterie' => $papeterie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="papeterie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Papeterie $papeterie): Response
    {
        $form = $this->createForm(PapeterieType::class, $papeterie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('papeterie_index');
        }

        return $this->render('papeterie/edit.html.twig', [
            'papeterie' => $papeterie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="papeterie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Papeterie $papeterie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$papeterie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($papeterie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('papeterie_index');
    }
}
