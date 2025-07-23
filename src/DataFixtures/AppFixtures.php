<?php

namespace App\DataFixtures;

use App\Entity\AlerteQualite;
use App\Entity\NoteQualite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use App\Entity\Stagiaire;


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

        for ($i=0; $i < 40; $i++) { 
            $noteQualite = new NoteQualite();

            $noteQualite->setValeur(mt_rand(1,3));
            $noteQualite->setTypeEvaluation(mt_rand(0,1) ? "Finale" : "Quotidienne");
            $noteQualite->setQuestion(mt_rand(0,1) ? "Contenu de la formation" : "Satisfaction générale");


            $manager->persist($stagiaire);
            
            $stagiaires[] = $stagiaire;
        }

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

        for ($i=0; $i < count($stagiaires); $i++) { 
            $alerte = new AlerteQualite();
            $alert->setStagiaireId($stagiaire[mt_rand(0,count($stagiaires))]);

            $alerte->setType(mt_rand(0,1) ? "Evaluation quotidienne" : "Evaluation finale");
            $alert->setTitre(`Le stagiaire `
                                . $alert->getStagiaireId()->getNom() . ` ` . $alert->getStagiaireId()->setNom()
                                . 'a mis ');

        }


        $manager->flush();
    }
}
