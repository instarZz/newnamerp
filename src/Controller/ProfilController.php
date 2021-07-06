<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProfilEditFormType;
use App\Repository\UserRepository;
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

        // return $this->render('common/error.html.twig', [
        //     'error' => 401,
        //     'message' => 'Unauthorized access',
        // ]);
    }

    #[Route('/profil/{id}/delete', name: 'app_profil_delete')]
    public function delete(User $user): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_home');
    }
}
