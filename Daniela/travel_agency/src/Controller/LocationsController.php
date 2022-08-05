<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class LocationsController extends AbstractController
{
    #[Route('/locations', name: 'app_locations')]
    public function index(): Response
    {
        return $this->render('locations/index.html.twig', [
            'controller_name' => 'LocationsController',
        ]);
    }

   
}
