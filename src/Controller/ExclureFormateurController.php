<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ExclureFormateurController extends AbstractController
{
    #[Route('/exclure/formateur', name: 'app_exclure_formateur')]
    public function index(): Response
    {
        return $this->render('exclure_formateur/index.html.twig', [
            'controller_name' => 'ExclureFormateurController',
        ]);
    }
}
