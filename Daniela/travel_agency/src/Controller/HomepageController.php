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


    #[Route('/homepage/{id}', name: 'app_info')]
    public function info(ManagerRegistry $doctrine, $id): Response
    {
        $locationInfo = $doctrine->getRepository(Locations::class)->find($id);
        return $this->render('homepage/details.html.twig', [
            "locationInfo" => $locationInfo
        ]);
    }


    // public function loopData(ManagerRegistry $doctrine): Response
    // {   $locations = $doctrine->getRepository(Locations::class)->findAll();
    //     return $this->render('homepage/index.html.twig', [
    //         "locations" => $locations
    //     ]);
    // }

  
}
