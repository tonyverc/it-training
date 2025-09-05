<?php

namespace App\Controller;

use App\Repository\FormateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_RESPONSABLE')]
final class ExclureFormateurController extends AbstractController
{
    #[Route('/exclure/formateur', name: 'app_exclure_formateur')]
    public function index(FormateurRepository $formRep): Response
    {

        $formateurs = $formRep->findAll();
        return $this->render('exclure_formateur/index.html.twig', [
            'formateurs' => $formateurs,
        ]);
    }
}
