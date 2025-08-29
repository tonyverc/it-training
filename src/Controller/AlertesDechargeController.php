<?php

namespace App\Controller;

use App\Entity\AlerteDecharge;
use App\Form\MarquerCommeLuType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\AlerteDechargeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

final class AlertesDechargeController extends AbstractController
{
    #[Route('/alertes/decharges', name: 'app_alertes_decharges')]
    public function index(AlerteDechargeRepository $alerteDechargeRepository, PaginatorInterface $paginator, Request $request): Response
    {   
        $alertes = $paginator->paginate($alerteDechargeRepository->getSorted(), $request->query->getInt("page", 1), 15);

        for ($i=0; $i < count($alertes); $i++) { 
            $forms[] = $this->createForm(MarquerCommeLuType::class, $alertes[$i])->createView();
        }

        return $this->render('alertes/alertesDecharges/index.html.twig', [
            'alertes' => $alertes,
            "forms" => $forms
        ]);
    }

    #[Route('/alertes/decharges/supprimer/{id}', name: 'app_delete_alertes_decharges', methods: ["POST"], defaults: ['switch' => false])]
    public function delete(AlerteDecharge $alerte, EntityManagerInterface $entityManager): Response
    {   
        $entityManager->remove($alerte);
        $entityManager->flush();

        return $this->redirectToRoute("app_alertes_decharges");
    }

    #[Route('/alertes/decharges/marquer-comme-lu/{id}', name: 'app_marquer_comme_lu_alertes_decharges', methods: ["POST"], defaults: ['id' => false])]
    
    public function marquerCommeLu(AlerteDecharge $alerte, EntityManagerInterface $entityManager): Response
    {   
        $alerte->setLu(true);    
        $entityManager->flush();

        return $this->redirectToRoute("app_alertes_decharges");
    }
}
