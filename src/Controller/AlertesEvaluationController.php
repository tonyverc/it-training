<?php

namespace App\Controller;

use App\Repository\AlerteQualiteRepository;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AlertesEvaluationController extends AbstractController
{
    #[Route('/alertes/evaluation', name: 'app_alertes_qualite', defaults: ['switch' => false])]
    public function index(AlerteQualiteRepository $alerteQualiteRepository, FormationRepository $formationRepository, Request $request): Response
    {
        $alertes = $alerteQualiteRepository->findAll();
        $formations = $formationRepository->findAll();

        return $this->render('alertes/alertesEvaluation/index.html.twig', [
            'alertes' => $alertes,
            "formations" => $formations,
        ]);
    }
}
