<?php  

namespace App\Controller;  

use App\Entity\Server;  
use Symfony\Bundle\FrameworkBundle\Controller\Controller;  
use Symfony\Component\HttpFoundation\Request; 

class PlatformController extends Controller 
{
    // En charge de la connexion
    public function loginn(Request $request, AuthenticationUtils $authenticationUtils){

    //Récupères les erreurs de connexion s'il y en a
    $error = $authenticationUtils->getLastAuthenticationError();

    // Récupères l'identifiant rentré par l'utilisateur
    $lastUsername = $authenticationUtils->getLastUsername();

    //Renvoie l'utilisateur sur la page d'acceuil si la connexion est échouée.
    return $this->render('Platform/home.html.twig', array(
        'last_username' => $lastUsername,
        'error'         => $error,
    ));

}
public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
{
    // 1) Générons le formulaire à partir de notre UserType
    $user = new User();
    $form = $this->createForm(UserType::class, $user);

    // 2) Traitement du formulaire une fois envoyé
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

        // 3)Encodage du mot de passe
        $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
        $user->setPassword($password);

        // 4) sauvegarde de l'utilisateur en base de données!
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        // ... Tout est terminée vous pouvez leur faire un coucou par mail ou faire autre chose
        // Pour le moment on va les rediriger vers notre page d'accueil interne

        return $this->redirectToRoute('dashboard');
    }
    //En cas d'erreur on reste sur le formulaire
    return $this->render(
        'Home/register.html.twig',
        array('form' => $form->createView())
    );
}

    //Now notre dernier contrôleur celui de la page d'accueil interne

    public function dashboard(){
        return $this->render('Platform/dashboard.html.twig');
    }

}
