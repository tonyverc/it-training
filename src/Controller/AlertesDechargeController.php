<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\AlerteDechargeRepository;

final class AlertesDechargeController extends AbstractController
{
    #[Route('/alertes/decharges', name: 'app_alertes_stagiaires')]
    public function index(AlerteDechargeRepository $alerteDechargeRepository): Response
    {   
        $alertes = $alerteDechargeRepository->findAll();

        return $this->render('alertes/alertesDecharges/index.html.twig', [
            'alertes' => $alertes,
        ]);
    }
}
