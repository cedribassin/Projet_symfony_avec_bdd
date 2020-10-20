<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Famille;
use App\Entity\Continent;
use App\Entity\Dispose;
use App\Entity\Personne;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $p1=new Personne();
        $p1->setNom("Cedric");
        $manager->persist($p1);

        $p2=new Personne();
        $p2->setNom("Lea");
        $manager->persist($p2);

        $p3=new Personne();
        $p3->setNom("Leeroy");
        $manager->persist($p3);

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

        //On crée un objet dispose qui indique que:
        //La personne $p1 dispose de 3 animaux $a5
        $d1 = new Dispose();
        $d1->setPersonne($p1)
        ->setAnimal($a5)
        ->setNb(3);
        $manager->persist($d1);

        $d2 = new Dispose();
        $d2->setPersonne($p2)
        ->setAnimal($a1)
        ->setNb(10);
        $manager->persist($d2);

        $d3 = new Dispose();
        $d3->setPersonne($p3)
        ->setAnimal($a3)
        ->setNb(15);
        $manager->persist($d3);

        $d4 = new Dispose();
        $d4->setPersonne($p1)
        ->setAnimal($a3)
        ->setNb(5);
        $manager->persist($d4);

        $d5 = new Dispose();
        $d5->setPersonne($p2)
        ->setAnimal($a2)
        ->setNb(5);
        $manager->persist($d5);

        $d6 = new Dispose();
        $d6->setPersonne($p3)
        ->setAnimal($a4)
        ->setNb(6);
        $manager->persist($d6);

        $manager->flush();
    }
}
