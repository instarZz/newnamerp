<?php

namespace App\Controller;

use App\Form\AddWeaponFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class WeaponController extends AbstractController
{
    #[Route('/weapon', name: 'weapon')]
    public function index(): Response
    {
        return $this->render('weapon/index.html.twig', [
            'controller_name' => 'WeaponController',
        ]);
    }

    #[Route('/weapons/add', name: 'app_weapons_add')]
    public function addWeapon(Security $security, Request $request, EntityManagerInterface $em): Response
    {
        $user = $security->getUser();

        $form = $this->createForm(AddWeaponFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_profil', ['id' => $user->getId()]);
        }

        return $this->render('weapon/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
