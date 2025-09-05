<?php

namespace App\DataFixtures;

use App\Entity\Affecte;
use App\Entity\Formateur;
use App\Entity\Formation;
use App\Entity\Session;
use App\Entity\Stagiaire;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    private $userPasswordHasherInterface;

    public function __construct (UserPasswordHasherInterface $userPasswordHasherInterface) 
    {
        $this->userPasswordHasherInterface = $userPasswordHasherInterface;
    }

    public function load(ObjectManager $manager): void
    {

        for($i = 0; $i<20; $i++) //User
        {
            $user = new User();
            $user->setEmail("user$i@mail.com");
            $plaintextPassword = "user$i";

            $hashedPassword = $this->userPasswordHasherInterface->hashPassword(
                $user,
                $plaintextPassword
            );
            $user->setPassword($hashedPassword);

            $manager->persist($user);
        }

        $formateur = null;
        for($i = 0; $i<40; $i++) //formateurs
        {
            
            $form = new Formateur();
            $form->setNom("formateur : $i");
            $form->setPrenom("formateur : $i");
            $form->setCv("formateur : $i");
            $form->setEstValide(false);
            $form->setEmail("formateur$i@mail.com");
            $plaintextPassword = "formateur$i";

            $hashedPassword = $this->userPasswordHasherInterface->hashPassword(
                $form,
                $plaintextPassword
            );
            $form->setPassword($hashedPassword);

            $manager->persist($form);
            if($i == 0)$formateur = $form;
        }
        $resp = new User();
        $resp->setEmail("resp@mail.com");
        $plaintextPassword = "1234";
        $hashedPassword = $this->userPasswordHasherInterface->hashPassword($resp, $plaintextPassword);
        $resp->setPassword($hashedPassword);
        $resp->setRoles(["ROLE_RESPONSABLE"]);
        $manager->persist($resp);
                //formation
        $formation = new Formation();
        $formation->setNom("formation");
        $formation->setFicheFormation("dgerzgre");
        $manager->persist($formation);

        $sessions = [];
        for($i = 0; $i<2; $i++) //sessions
        {
            $session = new Session();
            $session->setMinParticipant(3);
            $session->setPrix(3.0);
            $session->setDateDebut(new \DateTime());
            $session->setDateFin(new \DateTime());
            $session->setFormation($formation);


            $affecte = new Affecte();
            $affecte->setSession($session);
            $affecte->setFormateur($formateur);
            $affecte->setConfirmePresence(false);
            $manager->persist($session);
            $manager->persist($affecte);
            $sessions[] = $session;
        }

        for($i = 0; $i<2; $i++) //stagiaires
        {
            for($j = 0; $j<20; $j++)
            {
                $stagiaire = new Stagiaire();
                $stagiaire->setNom("nom");
                $stagiaire->setPrenom("nom");
                $stagiaire->setEmail("nom");
                $stagiaire->setDiplome("nom");
                $stagiaire->setPrerequisValide(false);
                
                $stagiaire->addSession($sessions[$i]);

                $manager->persist($stagiaire);
            }
        }
        $stagiaire = new Stagiaire();
        $stagiaire->setNom("nom");
        $stagiaire->setPrenom("nom");
        $stagiaire->setEmail("nom");
        $stagiaire->setDiplome("nom");
        $stagiaire->setPrerequisValide(false);
        $manager->persist($stagiaire);

        $manager->flush();
    }
}
