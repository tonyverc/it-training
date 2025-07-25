<?php

namespace App\Controller;

use App\Repository\AlerteQualiteRepository;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AlertesQualiteController extends AbstractController
{
    #[Route('/alertes', name: 'app_alertes')]
    public function index(AlerteQualiteRepository $alerteQualiteRepository, FormationRepository $formationRepository): Response
    {
        $alertes = $alerteQualiteRepository->findAll();
        $formations = $formationRepository->findAll();


        return $this->render('alertes_qualite/index.html.twig', [
            'alertes' => $alertes,
            "formations" => $formations,
        ]);
    }
}
