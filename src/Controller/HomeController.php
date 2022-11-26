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
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        } else {
            return $this->render('home/index.html.twig', [
                'controller_name' => 'HomeController',
            ]);
        }
    }
    #[Route('/home/play', name: 'app_play')]
    public function play(PlantRepository $plantRepository): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        } else {
            return $this->render('home/play.html.twig', [
                'plants' => $plantRepository->findAll(),
            ]);
        }
    }
    #[Route('/home/profil', name: 'app_profil')]
    public function profil(): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        } else {
            return $this->render('home/profil.html.twig', [
                'controller_name' => 'HomeController',
            ]);
        }
    }
    #[Route('/home/stats', name: 'app_stats')]
    public function stats(): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        } else {
            return $this->render('home/stats.html.twig', [
                'controller_name' => 'HomeController',
            ]);
        }
    }
}
