<?php

namespace App\Controller;

use App\Entity\EvaluationJour;
use App\Form\EvalFormType;
use App\Form\EvaluationJourType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


final class EvaluationJourController extends AbstractController
{
    #[Route('/evaluation/jour', name: 'app_evaluation_jour')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        // Instanciation d'une nouvelle date et d'une nouvelle évaluation
        $today = new \DateTime();
        $evaluation = new EvaluationJour();
        $evaluation->setDate($today);

        // Création du formulaire d'évaluation
        $form = $this->createForm(EvaluationJourType::class, $evaluation);
        $form->handleRequest($request);

        // Vérification si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            $repo = $em->getRepository(EvaluationJour::class);
            $existing = $repo->findOneBy([
                'stagiaire' => $evaluation->getStagiaire(),
                'date' => $today,
            ]);

            if ($existing) {
                $message = 'Vous avez déjà soumis une évaluation pour aujourd\'hui.';

                if ($request->isXmlHttpRequest()) {
                    return $this->json(['success' => false, 'message' => $message]);
                }

                $this->addFlash('error', $message);
                return $this->redirectToRoute('app_evaluation_jour');
            }

            $em->persist($evaluation);
            $em->flush();

            $message = 'Évaluation enregistrée avec succès.';

            if ($request->isXmlHttpRequest()) {
                return $this->json(['success' => true, 'message' => $message]);
            }

            $this->addFlash('success', $message);
            return $this->redirectToRoute('app_evaluation_jour');
        }

        return $this->render('evaluation_jour/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
