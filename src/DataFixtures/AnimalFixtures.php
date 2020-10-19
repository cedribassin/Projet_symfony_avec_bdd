<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Famille;
use App\Entity\Continent;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $continent1 = new Continent();
        $continent1->setLibelle("Europe");
        $manager->persist($continent1);

        $continent2 = new Continent();
        $continent2->setLibelle("Asie");
        $manager->persist($continent2);

        $continent3 = new Continent();
        $continent3->setLibelle("Afrique");
        $manager->persist($continent3);

        $continent4 = new Continent();
        $continent4->setLibelle("Amérique");
        $manager->persist($continent4);

        $continent5 = new Continent();
        $continent5->setLibelle("Océanie");
        $manager->persist($continent5);


        $c1 = new Famille();
        $c1->setLibelle("mammifères")
        ->setDescription("Animaux vertébrés nourissant leurs petits avec du lait");
        $manager->persist($c1);

        $c2 = new Famille();
        $c2->setLibelle("reptiles")
        ->setDescription("Animaux vertébrés à sang froid");
        $manager->persist($c2);

        $c3 = new Famille();
        $c3->setLibelle("poissons")
        ->setDescription("Animaux invertébrés du monde aquatique");
        $manager->persist($c3);


        //Création des animaux
        $a1 = new Animal();
        $a1->setNom("chien")
        ->setDescription("Un animal domestique")
        ->setImage("chien.png")
        ->setPoids(10)
        ->setDangereux(false)
        ->setFamille($c1)
        //ici on utilise addContinent qui permet d'ajouter l'animal dans le continent
        // et le continent dans l'animal
        ->addContinent($continent1)
        ->addContinent($continent2)
        ->addContinent($continent3)
        ->addContinent($continent4)
        ->addContinent($continent5);
        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setNom("cochon")
        ->setDescription("Un animal d'élevage")
        ->setImage("cochon.png")
        ->setPoids(90)
        ->setDangereux(false)
        ->setFamille($c1)
        ->addContinent($continent1)
        ->addContinent($continent2)
        ->addContinent($continent4)
        ->addContinent($continent5);

        $manager->persist($a2);

        $a3 = new Animal();
        $a3->setNom("crocodile")
        ->setDescription("Un animal très dangereux")
        ->setImage("croco.png")
        ->setPoids(500)
        ->setDangereux(true)
        ->setFamille($c2)
        ->addContinent($continent3)
        ->addContinent($continent4)
        ->addContinent($continent5);

        $manager->persist($a3);

        $a4 = new Animal();
        $a4->setNom("serpent")
        ->setDescription("Un animal dangereux, parfois venimeux")
        ->setImage("Serpent.png")
        ->setPoids(5)
        ->setDangereux(true)
        ->setFamille($c2)
        ->addContinent($continent1)
        ->addContinent($continent2)
        ->addContinent($continent3)
        ->addContinent($continent4)
        ->addContinent($continent5);

        $manager->persist($a4);

        $a5 = new Animal();
        $a5->setNom("requin")
        ->setDescription("Un animal marin très dangereux")
        ->setImage("requin.png")
        ->setPoids(1000)
        ->setDangereux(true)
        ->setFamille($c3)
        ->addContinent($continent3)
        ->addContinent($continent4)
        ->addContinent($continent5);

        $manager->persist($a5);

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
