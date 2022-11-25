<?php

namespace App\Controller;
use App\Repository\PlantRepository;
use App\Entity\Plant;
use App\Form\PlantType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\PlantController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/play', name: 'app_play')]
    public function play(PlantRepository $plantRepository): Response
    {
        return $this->render('home/play.html.twig', [
            'plants' => $plantRepository->findAll(),
        ]);
    }
    #[Route('/profil', name: 'app_profil')]
    public function profil(): Response
    {
        return $this->render('home/profil.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/stats', name: 'app_stats')]
    public function stats(): Response
    {
        return $this->render('home/stats.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
