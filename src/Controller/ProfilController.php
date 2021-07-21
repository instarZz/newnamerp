<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\AddGangFormType;
use App\Form\AddJobFormType;
use App\Form\AddWeaponsFormType;
use App\Form\ProfilEditFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil/{id}', name: 'app_profil')]
    public function index(UserRepository $userRepository, $id): Response
    {
        $user = $userRepository->find($id);

        return $this->render('profil/index.html.twig', [
            'user' => $user,
            '',
        ]);
    }

    #[Route('/profil/{id}/edit', name: 'app_profil_edit')]
    public function edit(Request $request, User $user, $id): Response
    {
        $form = $this->createForm(ProfilEditFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_profil', ['id' => $user->getId()]);
        }

        return $this->render('profil/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/profil/{id}/delete', name: 'app_profil_delete')]
    public function delete(User $user): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_home');

        return $this->render('profil/delete.html.twig', [
        ]);
    }

    #[Route('/job/{id}/add', name: 'app_job_add')]
    public function addJob(UserRepository $userRepository, Request $request, EntityManagerInterface $em, $id): Response
    {
        $user = $userRepository->find($id);
        // $userJob = $user->getJob();

        $form = $this->createForm(AddJobFormType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_profil', ['id' => $user->getId()]);
        }

        return $this->render('job/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/gang/{id}/add', name: 'app_gang_add')]
    public function addGang(UserRepository $userRepository, Request $request, EntityManagerInterface $em, $id): Response
    {
        $user = $userRepository->find($id);
        // $userJob = $user->getJob();

        $form = $this->createForm(AddGangFormType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_profil', ['id' => $user->getId()]);
        }

        return $this->render('gang/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/weapons/{id}/add', name: 'app_weapons_add')]
    public function addWeapons(UserRepository $userRepository, Request $request, EntityManagerInterface $em, $id): Response
    {
        $user = $userRepository->find($id);
        // $userJob = $user->getJob();

        $form = $this->createForm(AddWeaponsFormType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_profil', ['id' => $user->getId()]);
        }

        return $this->render('weapon/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
