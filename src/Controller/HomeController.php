<?php

namespace App\Controller;
use App\Repository\PlantRepository;
use App\Repository\UserRepository;
use App\Entity\Plant;
use App\Entity\Find;
use App\Entity\User;
use App\Form\FindType;
use App\Form\PlantType;
use App\Form\EditProfilType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\PlantController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

#[Route('/home')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/play', name: 'app_play')]
    public function play(Request $request ,PlantRepository $plantRepository): Response
    {
        $find = new Find();
        $form = $this->createForm(FindType::class, $find);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $find = $form->getData();
            echo 'Ajout réussi';
        }
        return $this->render('home/play.html.twig', [
            'plants' => $plantRepository->findAll(),
            'form' => $form->createView()
        ]);
    }

    #[Route('/profil', name: 'app_profil')]
    public function profil(): Response
    {
        return $this->render('home/profil.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/profil/edit', name: 'app_profil_edit')]
    public function editProfil(Request $request, ManagerRegistry $doctrine, UserPasswordHasherInterface $userPasswordHasher):Response
    {
        $user = $this->getUser();
        $form = $this->createForm(EditProfilType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('ModifPassword')->getData()
                )
            );
            $em = $doctrine->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash("message", "profil mis à jour");
            return $this->redirectToRoute('app_profil');
        }

        return $this->render('home/editprofil.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/profil/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        $session = new Session();
        $session->invalidate();

        return $this->redirectToRoute('app_register', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/stats', name: 'app_stats')]
    public function stats(): Response
    {
        return $this->render('home/stats.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
