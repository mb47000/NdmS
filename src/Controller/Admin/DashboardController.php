<?php

namespace App\Controller\Admin;

use App\Entity\Task;
use App\Entity\Unit;
use App\Entity\Admin;
use App\Entity\Devis;
use App\Entity\Customer;
use App\Entity\DevisDetails;
use App\Controller\Admin\AdminCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(AdminCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('NdmReboot');
    }

    public function configureMenuItems(): iterable
    {

        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('PDF Generator','far fa-file-pdf');
        yield MenuItem::linktoRoute('Devis', 'fas fa-file-contract', 'customers');
        yield MenuItem::section('Entity','fas fa-cube');
        yield MenuItem::linkToCrud('Admin', 'fas fa-user-shield', Admin::class);
        yield MenuItem::linkToCrud('Customers', 'fas fa-address-card', Customer::class);
        yield MenuItem::linkToCrud('Devis', 'fas fa-file-contract', Devis::class);
        yield MenuItem::linkToCrud('DevisDetails', 'far fa-list-alt', DevisDetails::class);
        yield MenuItem::linkToCrud('Tasks', 'fas fa-hammer', Task::class);
        yield MenuItem::linkToCrud('Units', 'fas fa-pound-sign', Unit::class);
    }
}