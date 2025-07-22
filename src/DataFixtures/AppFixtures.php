<?php

namespace App\DataFixtures;

use App\Entity\AlerteQualite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i=0; $i < 50; $i++) { 
            $alerte = new AlerteQualite();
            $alerte->setType(mt_rand(0,1) ? "Evaluation quotidienne" : "Evaluation finale");
            //$alerte->setTitre( );

        }


        $manager->flush();
    }
}
