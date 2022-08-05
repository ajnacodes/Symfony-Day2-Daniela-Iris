<?php

namespace App\Controller;

use App\Entity\Locations;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class HomepageController extends AbstractController
{
    #[Route('/homepage', name: 'app_homepage')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $locations = $doctrine->getRepository(Locations::class)->findAll();
        return $this->render('homepage/index.html.twig', [
            "locations" => $locations
        ]);
    }


    #[Route('/homepage/info/{id}', name: 'app_info')]
    public function info(ManagerRegistry $doctrine, $id): Response
    {
        $locationInfo = $doctrine->getRepository(Locations::class)->find($id);
        return $this->render('homepage/details.html.twig', [
            "locationInfo" => $locationInfo
        ]);
    }

    #[Route('/homepage/create', name: 'app_create')]
    public function create(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $location = new Locations();
        $location->setCity("CityTest");
        $location->setDescription("Description");
        $location->setPrice(1000);
        // dd($location);
        $em->persist($location);
        $em->flush();

        return new Response("Location has been created in : 
        ". $location->getCity() . " with price : ". $location->getPrice()
    );

    }



    // public function loopData(ManagerRegistry $doctrine): Response
    // {   $locations = $doctrine->getRepository(Locations::class)->findAll();
    //     return $this->render('homepage/index.html.twig', [
    //         "locations" => $locations
    //     ]);
    // }

  
}
