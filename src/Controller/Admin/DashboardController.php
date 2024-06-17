<?php

namespace App\Controller\Admin;

use App\Entity\Mode;
use App\Entity\User;
use App\Entity\Sport;
use App\Entity\Produits;
use App\Entity\RoleAdmin;
use App\Entity\SetCategory;
use App\Security\Voter\BlogPostVoter;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{

    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(ModeCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tourisme');
    }

    public function configureMenuItems(): iterable
    {
        // dd($this->security->isGranted('ROLE_ADMIN'));
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Produits');
        yield MenuItem::linkToCrud('Mode', 'fas fa-list', Mode::class);
        yield MenuItem::linkToCrud('Produit', 'fas fa-list', Produits::class);
        yield MenuItem::linkToCrud('Sport', 'fas fa-list', Sport::class);
        
        yield MenuItem::section('Utilisateurs');
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);

        if ($this->security->isGranted('ROLE_ADMIN')) {
            yield MenuItem::section('Admin');     
            // yield MenuItem::linkToCrud('Role Admin', 'fas fa-list', RoleAdmin::class);
            yield MenuItem::linkToCrud('Set Category', 'fas fa-list', SetCategory::class);
        }
    }    
}
