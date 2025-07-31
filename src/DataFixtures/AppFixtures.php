<?php

namespace App\DataFixtures;

use App\Entity\AlerteDecharge;
use App\Entity\AlerteQualite;
use App\Entity\NoteQualite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use App\Entity\Stagiaire;
use App\Entity\EvaluationJour;
use App\Entity\Formateur;
use App\Entity\Formation;
use App\Entity\Session;
use DateTime;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private Generator $faker;
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
{
    $this->faker = Factory::create("fr_FR");
    $this->hasher = $hasher;
}

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $notesQualite = [];

        // for ($i=0; $i < 40; $i++) { 
        //     $noteQualite = new NoteQualite();

        //     $noteQualite->setValeur(mt_rand(1,3));
        //     $noteQualite->setTypeEvaluation(mt_rand(0,1) ? "Finale" : "Quotidienne");
        //     $noteQualite->setQuestion(mt_rand(0,1) ? "Contenu de la formation" : "Satisfaction générale");


        //     $manager->persist($stagiaire);
            
        //     $stagiaires[] = $stagiaire;
        // }

        $formations = [];

        $formation = new Formation();
        $formation->setNom("Développement Python");
        $formation->setFicheFormation("Lorem ipsum");

        $formations[] = $formation;

        $manager->persist($formation);

        $formation = new Formation();
        $formation->setNom("Développement Java");
        $formation->setFicheFormation("Lorem ipsum");

        $formations[] = $formation;

        $manager->persist($formation);


        $stagiaires = [];
        for ($i=0; $i < 40; $i++) { 
            $stagiaire = new Stagiaire();
            $stagiaire->setNom($this->faker->lastName());
            $stagiaire->setPrenom($this->faker->firstName());
            $stagiaire->setDiplome($this->faker->name());
            $stagiaire->setPrerequisValide(true);

            $manager->persist($stagiaire);
            
            $stagiaires[] = $stagiaire;
        }

        $sessions = [];

        for ($i=0; $i < 50; $i++) { 
            $session = new Session();
            $session->setMinParticipants(mt_rand(3,4));
            $session->setPrix(mt_rand(223.05,433.65));
            $session->setDateDebut(new DateTime('2025-07-31 15:30:00'));
            $session->setDateFin(new DateTime('2025-12-31 15:30:00'));
            $session->setFormation($formations[mt_rand(0,count($formations) - 1)]);
            
            $sessions[] = $session;
            $manager->persist($session);
        }
        

        $formateurs = [];

        for ($i=0; $i < 20; $i++) { 
            $formateur = new Formateur();
            $formateur->setEmail($this->faker->email());
            $formateur->setPrenom($this->faker->firstName());
            $formateur->setNom($this->faker->lastName());
            $formateur->setPassword($this->hasher->hashPassword($formateur, "password"));

            $manager->persist($formateur);
            $formateurs[] = $formateur;
        }

        $evaluationsJour = [];

        for ($i=0; $i < 50; $i++) { 
            $alerteDecharge = new AlerteDecharge();
            $alerteDecharge->setFormation($formations[mt_rand(0,1) ? 0 : count($formations) - 1]);
            $alerteDecharge->setFormateur($formateurs[mt_rand(0,count($formateurs) - 1)]);
            $alerteDecharge->setSession($sessions[mt_rand(0,count($formateurs) - 1)]);
            $alerteDecharge->setStagiaire($stagiaires[mt_rand(0,count($stagiaires) - 1)]);
            $alerteDecharge->setContenu("Le formateur " . $alerteDecharge->getFormateur()->getPrenom() . " " . $alerteDecharge->getFormateur()->getNom()
                                         .  "a dechargé de sa résponsabilité du stagiaire");

            $manager->persist($alerteDecharge);
        }

        for ($i=0; $i < 50 ; $i++) { 
            $evaluationJour = new EvaluationJour();

            $idStagiaire = $stagiaires[mt_rand(0,count($stagiaires) - 1)];

            $evaluationJour->setStagiaire($idStagiaire);
            $evaluationJour->setFormation($formations[mt_rand(0,count($formations) - 1)]);
            $evaluationJour->setSatisfaction(mt_rand(1,5));
            $evaluationJour->setClarte(mt_rand(1,5));
            $evaluationJour->setDifficultes(mt_rand(0,1) ? null : $this->faker->paragraph());
            $evaluationJour->setSuggestions(mt_rand(0,1) ? null : $this->faker->paragraph());

            if($evaluationJour->getSatisfaction() < 4 || $evaluationJour->getClarte() < 4) {
                
                $messageTitre = "";
                $messageDescription = "";

                $alerte = new AlerteQualite();

                $alerte->setStagiaire($idStagiaire);
                $alerte->setEvaluationJour($evaluationJour);

                if ($evaluationJour->getSatisfaction() < 4){
                    $messageTitre = "Le stagiaire "
                                . $alerte->getStagiaire()->getNom() . " " . $alerte->getStagiaire()->getPrenom()
                                . ' a mis une note ' . $evaluationJour->getSatisfaction() . " de satisfaction";
                }
                else if ($evaluationJour->getSatisfaction() < 4 && $evaluationJour->getClarte() < 4){
                    $messageTitre = "Le stagiaire "
                                . $alerte->getStagiaire()->getNom() . " " . $alerte->getStagiaire()->getPrenom()
                                . ' a mis une note ' . $evaluationJour->getSatisfaction() . " de satisfaction" . " et une note"
                                . $evaluationJour->getClarte() . " de clarté";
                }
                else {
                    $messageTitre = "Le stagiaire "
                                . $alerte->getStagiaire()->getNom() . " " . $alerte->getStagiaire()->getPrenom()
                                . ' a mis une note '
                                . $evaluationJour->getClarte() . " de clarté";
                }

                if($evaluationJour->getDifficultes()) {
                    $messageDescription = "<span>Difficultés:</span> " . $evaluationJour->getDifficultes() . "<br/>" . "<span>Suggestions:</span> non déclaré";
                }
                else if ($evaluationJour->getDifficultes() || $evaluationJour->getSuggestions()) {
                    $messageDescription = "<span>Difficultés:</span> " . $evaluationJour->getDifficultes() . "<br/>" . "<span>Suggestions:</span> " . $evaluationJour->getSuggestions();
                }
                else if ($evaluationJour->getSuggestions()) {
                    $messageDescription = "<span>Difficultés:</span> non déclarées <br/>" . "<span>Suggestions:</span> " . $evaluationJour->getSuggestions();
                }

                else {
                    $messageDescription = "Ni difficultés ni suggestions ne sont déclarées";
                }

                $evaluationJour->setAlerteQualite($alerte);

                $alerte->setTitre($messageTitre);
                $alerte->setDescription($messageDescription);
                $alerte->setFormation($formations[mt_rand(0,count($formations) - 1)]);

                $manager->persist($alerte);
            }
            $manager->persist($evaluationJour);
        }

        

        $manager->flush();
    }
}
