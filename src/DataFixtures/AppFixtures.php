<?php

namespace App\DataFixtures;

use App\Entity\Annonce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {

        // create 20 products! Bam!
        $faker = Faker\Factory::create('fr_FR');

        // on créé 10 personnes
        for ($i = 0; $i < 10; $i++) {
            $product = new Annonce();
            $product->setTitle($faker->sentence);
            $product->setContent($faker->text);
            $product->setPrice($faker->randomFloat());

            $manager->persist($product);
        }

        $manager->flush();
    }
}
