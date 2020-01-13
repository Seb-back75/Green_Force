<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CdController extends AbstractController
{
    /**
     * @Route("/cd", name="cd")
     */
    public function index()
    {
        return $this->render('cd/index.html.twig', [
            'controller_name' => 'CdController',
        ]);
    }
}
