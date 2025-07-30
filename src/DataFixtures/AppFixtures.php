<?php

namespace App\DataFixtures;

use App\Entity\AlerteQualite;
use App\Entity\NoteQualite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use App\Entity\Stagiaire;
use App\Entity\EvaluationJour;
use App\Entity\Formation;

class AppFixtures extends Fixture
{
    private Generator $faker;

    public function __construct(){
        $this->faker = Factory::create("fr_FR");
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
            $stagiaire->setNom($this->faker->word());
            $stagiaire->setPrenom($this->faker->word());
            $stagiaire->setDiplome($this->faker->word());
            $stagiaire->setPrerequisValide(true);

            $manager->persist($stagiaire);
            
            $stagiaires[] = $stagiaire;
        }

        for ($i=0; $i < 50; $i++) { 
            $session = new Session();
            $session->setMinParticipants(mt_rand(3,4));
            $session->setPrix(mt_rand(223.05,433.65));
            $session->setFormation($formations[mt_rand(0,count($formations) - 1)]);
        }


        $evaluationsJour = [];

        for ($i=0; $i < 50; $i++) { 
            $alerteDecharge = new AlerteDecharge();
            $alerteDecharge->setFormation($formations[mt_rand(0,1) ? 0 : count($formations) - 1]);
            
            $alerteDecharge->setStagiaire($stagiaires[mt_rand(0,1) ? 0 : count($stagiaires) - 1]);
            $alerteDecharge->setContenu($this->faker->paragraph());
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
                                . $alerte->getStagiaire()->getNom() . ` ` . $alerte->getStagiaire()->getNom()
                                . ' a mis une note ' . $evaluationJour->getSatisfaction() . " de satisfaction";
                }
                else if ($evaluationJour->getSatisfaction() < 4 && $evaluationJour->getClarte()){
                    $messageTitre = "Le stagiaire "
                                . $alerte->getStagiaire()->getNom() . ` ` . $alerte->getStagiaire()->getNom()
                                . ' a mis une note ' . $evaluationJour->getSatisfaction() . " de satisfaction" . " et une note"
                                . $evaluationJour->getClarte() . " de clarté";
                }
                else {
                    $messageTitre = "Le stagiaire "
                                . $alerte->getStagiaire()->getNom() . ` ` . $alerte->getStagiaire()->getNom()
                                . ' a mis une note '
                                . $evaluationJour->getClarte() . " de clarté";
                }

                if($evaluationJour->getDifficultes()) {
                    $messageDescription = $evaluationJour->getDifficultes();
                }
                else if ($evaluationJour->getDifficultes() || $evaluationJour->getSuggestions()) {
                    $messageDescription = $evaluationJour->getDifficultes() . "<br/>" . $evaluationJour->getSuggestions();
                }
                else {
                    $messageDescription = $evaluationJour->getSuggestions();
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
