<?php

namespace App\Controller;

use App\Entity\EvaluationFinal;
use App\Form\EvaluationFinalType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EvaluationFinalController extends AbstractController
{
#[Route('/evaluation/final', name: 'app_evaluation_final')]
public function evaluationFinal(Request $request, EntityManagerInterface $em): Response
{
    $today = new \DateTime();
    $evaluation = new EvaluationFinal();
    $evaluation->setDate($today);

    $form = $this->createForm(EvaluationFinalType::class, $evaluation);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $repo = $em->getRepository(EvaluationFinal::class);
        $existing = $repo->findOneBy([
            // 'stagiaire' => $evaluation->getStagiaire(),
            'date' => $today,
        ]);

        if ($existing) {
            $this->addFlash('error', 'Vous avez déjà soumis une évaluation pour aujourd\'hui.');
        } else {
            $em->persist($evaluation);
            $em->flush();
            $this->addFlash('success', 'Évaluation enregistrée avec succès.');
        }
    }

    return $this->render('evaluation_final/index.html.twig', [
        'form' => $form->createView(),
        'controller_name' => 'EvaluationFinalController',
    ]);
}
}

