<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Entity\User;
use App\Form\AddCarsUserFormType;
use App\Form\CarsFormType;
use App\Repository\CarsRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class CarsController extends AbstractController
{
    /**
     * @Route("/cars/{id}/new", name="app_cars_new", methods="GET|POST")
     *
     * @param mixed $id
     */
    public function createCars(EntityManagerInterface $em, Security $security, Request $request, UserRepository $userRepository, $id)
    {
        $user = $userRepository->find($id);
        $cars = new Cars();
        $form = $this->createForm(CarsFormType::class, $cars);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($cars);
            $em->flush();

            $this->addFlash('success', 'Your cars has been created successfully.');

            return $this->redirectToRoute('app_profil', ['id' => $user->getId()]);
        }

        return $this->render('cars/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/cars/{id}/add', name: 'app_cars_add')]
    public function addCars(EntityManagerInterface $em, Security $security, Request $request, UserRepository $userRepository, User $user, CarsRepository $carsRepository, $id): Response
    {
        $cars = $carsRepository->find($id);
        $form = $this->createForm(AddCarsUserFormType::class, $user);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $user->setCar_id($cars);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user, $cars);
            $em->flush();

            $this->addFlash('success', 'Your cars has been added successfully.');

            return $this->redirectToRoute('app_profil', ['id' => $user->getId()]);
        }

        return $this->render('cars/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
