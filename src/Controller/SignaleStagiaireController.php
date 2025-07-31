<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SignaleStagiaireController extends AbstractController
{
    #[Route('/signale/stagiaire', name: 'app_signale_stagiaire')]
    public function index(): Response
    {
        return $this->render('signale_stagiaire/index.html.twig', [
            'controller_name' => 'SignaleStagiaireController',
        ]);
    }
}
