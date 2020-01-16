<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request): Response
    {
        $contact = new contact();
        $form = $this->createForm(contactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            $this->addFlash('notice', 'Votre message a bien été envoyé !!'); 

            return $this->redirectToRoute('produit_index');
        }

        return $this->render('contact/contact.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);

        /*return $this->render('contact/contact.html.twig', [
            'controller_name' => 'ContactController',
        ]);*/
    }
}
