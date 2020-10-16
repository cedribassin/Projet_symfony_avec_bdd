<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $a1 = new Animal();
        $a1->setNom("chien")
        ->setDescription("Un animal domestique")
        ->setImage("chien.png")
        ->setPoids(10)
        ->setDangereux(false);
        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setNom("cochon")
        ->setDescription("Un animal d'élevage")
        ->setImage("cochon.png")
        ->setPoids(90)
        ->setDangereux(false);
        $manager->persist($a2);

        $a3 = new Animal();
        $a3->setNom("crocodile")
        ->setDescription("Un animal très dangereux")
        ->setImage("croco.png")
        ->setPoids(500)
        ->setDangereux(true);
        $manager->persist($a3);

        $a4 = new Animal();
        $a4->setNom("serpent")
        ->setDescription("Un animal dangereux, parfois venimeux")
        ->setImage("Serpent.png")
        ->setPoids(5)
        ->setDangereux(true);
        $manager->persist($a4);

        $a5 = new Animal();
        $a5->setNom("requin")
        ->setDescription("Un animal marin très dangereux")
        ->setImage("requin.png")
        ->setPoids(1000)
        ->setDangereux(true);
        $manager->persist($a5);

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
