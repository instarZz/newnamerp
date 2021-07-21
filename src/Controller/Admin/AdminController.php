<?php

namespace App\Controller\Admin;

use App\Entity\Cars;
use App\Entity\Gang;
use App\Entity\Job;
use App\Entity\User;
use App\Entity\Weapons;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// ...

class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/adminpanel", name="admin_panel")
     *
     * @param mixed $id
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
            // the name visible to end users
            ->setTitle('NewName RP')
            // you can include HTML contents too (e.g. to link to an image)
            ->setTitle('<img src="/img/LogoNN.png" height="100px" width="100px" alt="logo newname"><p>NewName RP</p>')

            // the path defined in this method is passed to the Twig asset() function
            ->setFaviconPath('favicon.svg')

            // the domain used by default is 'messages'
            ->setTranslationDomain('my-custom-domain')

            // there's no need to define the "text direction" explicitly because
            // its default value is inferred dynamically from the user locale
            ->setTextDirection('ltr')

            // set this option if you prefer the page content to span the entire
            // browser width, instead of the default design which sets a max width
            ->renderContentMaximized()

            // set this option if you prefer the sidebar (which contains the main menu)
            // to be displayed as a narrow column instead of the default expanded design
            ->renderSidebarMinimized()

            // by default, all backend URLs include a signature hash. If a user changes any
            // query parameter (to "hack" the backend) the signature won't match and EasyAdmin
            // triggers an error. If this causes any issue in your backend, call this method
            // to disable this feature and remove all URL signature checks
            ->disableUrlSignatures()

            // by default, all backend URLs are generated as absolute URLs. If you
            // need to generate relative URLs instead, call this method
            ->generateRelativeUrls()
        ;
    }

    // ...
}

// class AdminController extends AbstractDashboardController
// {
//     /**
//      * @Route("/adminpanel", name="admin_panel")
//      */
//     public function index(): Response
//     {
//         return parent::index();
//     }

//     public function configureDashboard(): Dashboard
//     {
//         return Dashboard::new()
//             ->setTitle('Newnamerp')
//         ;
//     }

//     public function configureMenuItems(): iterable
//     {
//         yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
//         // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
//     }
// }
