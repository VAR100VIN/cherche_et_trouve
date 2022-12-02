<?php

namespace App\Controller;
use App\Repository\PlantRepository;
use App\Entity\Plant;
use App\Entity\Find;
use App\Form\FindType;
use App\Form\PlantType;
use Symfony\Component\HttpFoundation\Request;
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
    #[Route('/play', name: 'app_play')]
    public function play(Request $request ,PlantRepository $plantRepository): Response
    {
        $find = new Find();
        $form = $this->createForm(FindType::class, $find);
        $form->handleRequest($request);
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        } else {
            return $this->render('home/play.html.twig', [
                'plants' => $plantRepository->findAll(),
                'form' => $form->createView()
            ]);
        }
    }
    #[Route('/profil', name: 'app_profil')]
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
    #[Route('/stats', name: 'app_stats')]
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
