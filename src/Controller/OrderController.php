<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Stripe\Stripe;

class OrderController extends AbstractController
{
    /**
     * @param Request $request
     * @Route("/checkout", name="checkout")
     */
    public function checkoutAction(Request $request)
    {
        if($request->isMethod('POST')){
            $error = false;
            $token = $request->request->get('stripeToken'); 
            
            try{
                \Stripe\Stripe::setApiKey("sk_test_Qdz8ZUyGKAczitTnXLaNk7TT00gSR6OK3C");//completer token
                \Stripe\Charge::create([
                    "amount"=> 2000,//montant variable
                    "currency" => "cad",
                    "source" => $token,
                    "description" => "Charge for jenny.rosen@example.com"
                ]);
            } catch(\Stripe\Error\Card $exception) {
                $error = $exception->getMessage();
            }
            if(!error){
                $this->addFlash('succes', "Votre paiement a été bien effectué");
                return $this->redirectionToRoute('homepage');// route du homepage
            }
            $this->addFlash('error', $error);
            return $this->redirectionToRoute('homepage');// route du homepage
        }
       
    }
}
