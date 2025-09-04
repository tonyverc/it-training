<?php

namespace App\Controller;

use App\Entity\AlerteQualite;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Formation;
use App\Entity\Stagiaire;
use App\Form\AlerteTriType;
use App\Form\MarquerCommeLuType;
use App\Repository\AlerteQualiteRepository;
use App\Repository\FormationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class AlertesEvaluationController extends AbstractController
{
    #[Route('/alertes/evaluation', name: 'app_alertes_qualite', defaults: ['switch' => false])]
    public function index( AlerteQualiteRepository $alerteQualiteRepository, FormationRepository $formationRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $alertes = $paginator->paginate($alerteQualiteRepository->getSorted(), $request->query->getInt("page", 1), 15);
        
        $formations = $formationRepository->findAll();

        

        $forms = [];

        for ($i=0; $i < count($alertes); $i++) { 
            $forms[] = $this->createForm(MarquerCommeLuType::class, $alertes[$i])->createView();
        }
        

        return $this->render('alertes/alertesEvaluation/index.html.twig', [
            'alertes' => $alertes,
            "formations" => $formations,
            "forms" => $forms,
        ]);
    }

    #[Route('/alertes/evaluation/supprimer/{id}', name: 'app_delete_alertes_qualite', methods: ["DELETE"], defaults: ['switch' => false])]
    public function delete(AlerteQualite $alerte, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {   
        $messageAlerte = $alerte;
        $entityManager->remove($alerte);
        $entityManager->flush();

        return $this->json(['message' => 'Supprimé avec succes', "Code status" => 200], 200);
    }

    #[Route('/alertes/evaluation/marquer-comme-lu/{id}', name: 'app_marquer_comme_lu_alertes_qualite', methods: ["POST"], defaults: ['id' => false])]
    
    public function marquerCommeLu(AlerteQualite $alerte, AlerteQualiteRepository $alerteQualiteRepository, FormationRepository $formationRepository, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {   
        $alerte->setLu(true);    
        $entityManager->flush();

        return $this->json(['message' => 'Marqué comme lu', "Code status" => 200], 200);
    }
    
    #[Route('/alertes/evaluation/trier', name: 'app_trier', methods: ["GET"], defaults: ['formationId' => false, 'stagiaireNomPrenom' => false])]

    public function getSortedByFilter(AlerteQualiteRepository $alerteQualiteRepository, FormationRepository $formationRepository, PaginatorInterface $paginator, Request $request): Response {
        
        $alertes = $paginator->paginate($alerteQualiteRepository->getSortedByFilter($request->query->get("formationId"), $request->query->get("stagiaireNomPrenom")), $request->query->getInt("page", 1), 15);

        $formations = $formationRepository->findAll();

        $forms = [];

        for ($i=0; $i < count($alertes); $i++) { 
            $forms[] = $this->createForm(MarquerCommeLuType::class, $alertes[$i])->createView();
        }
        

        return $this->render('alertes/alertesEvaluation/index.html.twig', [
            'alertes' => $alertes,
            "formations" => $formations,
            "forms" => $forms,
        ]);
    }
    
}
