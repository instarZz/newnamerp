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

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(EntityManagerInterface $entityManager, Request $request, Security $security, ): Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);

        $cars = new Cars();
        $form = $this->createForm(CarsFormType::class, $cars);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->security->getUser();
            $cars->setCar($user);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cars);
            $entityManager->flush();

            return $this->redirectToRoute('app_profil');
        }

        return $this->render('profil/index.html.twig', [
            // 'car' => $cars,
            'carsForm' => $form->createView(),
        ]);
    }
}
