<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserLoginController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function user()
    {
        return $this->render('/user.html.twig');
    }
}
