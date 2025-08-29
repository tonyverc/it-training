<?php

namespace App\Controller;

use App\Entity\Mail;
use App\Form\SEnOccuperDeMailType;
use App\Repository\MailRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;


final class EmailController extends AbstractController
{
    #[Route('/crm/emails', name: 'app_email')]
    public function index(MailRepository $mailRepository, PaginatorInterface $paginator, Request $request): Response
    {   
        $mails = $paginator->paginate($mailRepository->getSorted(), $request->query->getInt("page", 1), 15);

        $forms = [];

        for ($i=0; $i <  count($mails); $i++) { 
            $forms[] = $this->createForm(SEnOccuperDeMailType::class, $mails[$i])->createView();
        }

        return $this->render('emails/index.html.twig', [
          "mails" => $mails,
          "forms" => $forms,
        ]);
    }

    #[Route('/crm/emails/s-en-occuper/{id}', name: 'app_email_s_en_occuper', methods: ["POST"])]
    public function sEnOccuper(MailRepository $mailRepository, EntityManagerInterface $entityManager, Mail $mail): Response
    {   
        $mail->setStatus("En cours");
        $entityManager->flush();

        return $this->redirectToRoute("app_email");
    }

    #[Route('/crm/emails/supprimer/{id}', name: 'app_email_delete', methods: ["POST"])]
    public function delete(MailRepository $mailRepository, EntityManagerInterface $entityManager, Mail $mail): Response
    {   
        $entityManager->remove($mail);
        $entityManager->flush();

        return $this->redirectToRoute("app_email");
    }
}
