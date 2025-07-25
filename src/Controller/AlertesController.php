<?php

namespace App\Controller;

use App\Repository\AlerteQualiteRepository;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AlertesController extends AbstractController
{
    #[Route('/alertes', name: 'app_alertes', defaults: ['switch' => false])]
    public function index(AlerteQualiteRepository $alerteQualiteRepository, FormationRepository $formationRepository, Request $request): Response
    {
        $alertes = $alerteQualiteRepository->findAll();
        $formations = $formationRepository->findAll();

        return $this->render('alertes/index.html.twig', [
            'alertes' => $alertes,
            "formations" => $formations,
        ]);
    }
}
