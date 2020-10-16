<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    /**
     * @Route("/", name="animaux")
     */ 
    
    //On fait une injection de dépendance qui permettra de récupérer directement les infos
    // AnimalRepository  
    public function index(AnimalRepository $repository)
    {
        //on met dans $repository les infos de la class AnimalRepository => pas necessaire si on a mis 
        // l'injection de dépendance
        // $repository = $this->getDoctrine()->getRepository(Animal::class);

        //On récupère dans $animaux toutes les info des animaux qu'on pourra ensuite
        // transmettre au render
        $animaux = $repository->findAll();

        return $this->render('animal/index.html.twig', [
            "animaux"=>$animaux
        ]);
    }
}
