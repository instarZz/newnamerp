<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Form\CarsFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class CarsController extends AbstractController
{
    #[Route('/cars', name: 'app_cars')]
    public function index(): Response
    {
        return $this->render('cars/index.html.twig', [
            'controller_name' => 'CarsController',
        ]);
    }

    /**
     * @Route("/cars/new", name="app_cars_new", methods="GET|POST")
     */
    public function createCars(EntityManagerInterface $em, Security $security, Request $request)
    {
        $cars = new Cars();
        $form = $this->createForm(CarsFormType::class, $cars);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($cars);
            $em->flush();

            $this->addFlash('success', 'Your cars has been created successfully.');

            return $this->redirectToRoute('app_profil');
        }

        return $this->render('cars/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
