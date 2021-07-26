<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/adminpanel", name="admin_panel")
     */
    public function index(): Response
    {
        // dd($_SESSION);
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());
        // you can also redirect to different pages depending on the current user
        if ('ROLE_ADMIN' === $this->getUser()->getUsername()) {
            return $this->redirect('app_profil', ['id' => $user->getId()]);
        }

        // you can also render some template to display a proper Dashboard
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        return $this->render('admin/dashboard.html.twig', [
            'user' => $user,
        ]);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Mon Profil', 'fa fa-home', 'app_profil', ['id' => $this->getUser()->getId()]); // afficher le bouton accueil
        yield MenuItem::linkToCrud('User', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('Cars', 'fa fa-car', Cars::class);
        yield MenuItem::linkToCrud('Weapons', 'fa fa-jedi', Weapons::class);
        yield MenuItem::linkToCrud('Job', 'fa fa-briefcase', Job::class);
        yield MenuItem::linkToCrud('Gang', 'fa fa-cannabis', Gang::class);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Newnamerp')
        ;
    }
}
