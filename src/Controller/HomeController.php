<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/join', name: 'app_join')]
    public function join(): Response
    {
        return $this->render('home/join.html.twig', [
        ]);
    }

    #[Route('/soutien', name: 'app_soutien')]
    public function soutien(): Response
    {
        return $this->render('home/soutien.html.twig', [
        ]);
    }

    #[Route('/gallery', name: 'app_gallery')]
    public function gallery(): Response
    {
        return $this->render('home/gallery.html.twig', [
        ]);
    }
}
