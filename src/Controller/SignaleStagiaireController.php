<?php

namespace App\Controller;

use App\Entity\Formateur;
use App\Entity\SignalementStagiaire;
use App\Entity\Stagiaire;
use App\Form\SignalementStagiaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;


#[IsGranted('ROLE_FORMATEUR')]
final class SignaleStagiaireController extends AbstractController
{
    #[Route('formateur/signaler/stagiaire', name: 'app_signale_stagiaire')]
    public function index(): Response
    {
        $user = $this->getUser();
        if ($user instanceof Formateur)
        {
            $formationList = [];
            for($i=0; $i<$user->getAffectes()->count();$i++)
            {
                $formationList[] = $user->getAffectes()[$i]->getSession();
            }
            
            return $this->render('signale_stagiaire/index.html.twig', [
                'formations' => $formationList,
            ]);
        }

        return new Response("seul un formateur devrait être ici et avoir le rôle formateur", 500);
    }

        #[Route('/formateur/signaler/stagiaire/{id}', name: 'app_formateur_signaler_stagiaire')]
    public function signaling(Stagiaire $stagiaire, Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        if (!($user instanceof Formateur))
        {
            return new Response("seul un formateur devrait être ici et avoir le rôle formateur", 500);
        }
        $signalement = new SignalementStagiaire();
        $form = $this->createForm(SignalementStagiaireType::class, $signalement);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {

            if($stagiaire->getSession()->getAffecte())
            $signalement = $form ->getData();
            $signalement->setFormateur($user);
            $signalement->setStagiaire($stagiaire);
            $em->persist($signalement);
            $em->flush();
        }

            return $this->render("signale_stagiaire/form.html.twig", ["form" => $form, "nom_stagiaire"=> $stagiaire->getNom(), "prenom_stagiaire" =>$stagiaire->getPrenom()]);
    }
}
