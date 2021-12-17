<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Profile;
use App\Entity\User;
use App\Entity\Trainee;
use App\Entity\WorkStation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Societe R');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Retour au site', 'fas fa-home', 'homepage');
        yield MenuItem::linkToCrud('Profil', 'fas fa-map-marker-alt', Profile::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-comments', User::class);
        yield MenuItem::linkToCrud('Stagiaire', 'fas fa-comments', Trainee::class);
        yield MenuItem::linkToCrud('Workstation', 'fas fa-comments', WorkStation::class);
        yield MenuItem::linkToCrud('Category', 'fas fa-comments', Category::class);
    }
}
