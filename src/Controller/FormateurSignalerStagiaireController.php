<?php

namespace App\Controller;

use App\Entity\Formateur;
use App\Entity\Stagiaire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_FORMATEUR')]
final class FormateurSignalerStagiaireController extends AbstractController
{
    #[Route('/formateur/signaler/stagiaire', name: 'app_formateur_signaler_stagiaire')]
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

            return $this->render('formateur_signaler_stagiaire/index.html.twig', [
                'formations' => $formationList,
            ]);
        }

        return new Response("seul un formateur devrait être ici et avoir le rôle formateur", 500);
    }

    #[Route('/formateur/signaler/stagiaire/{id}', name: 'app_formateur_signaler_stagiaire')]
    public function signaling(Stagiaire $stagiaire): Response
    {
        $user = $this->getUser();
        if ($user instanceof Formateur)
        {
            $formationList = [];
            for($i=0; $i<$user->getAffectes()->count();$i++)
            {
                $formationList[] = $user->getAffectes()[$i]->getSession();
            }

            return $this->render('formateur_signaler_stagiaire/index.html.twig', [
                'formations' => $formationList,
            ]);
        }

        return new Response("seul un formateur devrait être ici et avoir le rôle formateur", 500);
    }
}
