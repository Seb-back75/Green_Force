<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }

    /**
     * @Route("/conditions", name="conditions")
     */
    public function conditions()
    {
        return $this->render('homepage/conditions.html.twig');
    }
    /**
     * @Route("/politique", name="politique")
     */
    public function politique()
    {
        return $this->render('homepage/conditions.html.twig');
    }
    /**
     * @Route("/mention", name="mention")
     */
    public function mention()
    {
        return $this->render('homepage/mention.html.twig');
    }
}
