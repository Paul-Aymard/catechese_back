<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    #[IsGranted('ROLE_USER')]
    public function index(): RedirectResponse|Response
    {
        $user = $this->getUser();
        $roles = $user->getRoles();

        // Rediriger selon le rôle principal
        if (in_array('ROLE_ADMINISTRATEUR', $roles)) {
            return $this->redirectToRoute('admin_dashboard');
        } elseif (in_array('ROLE_CATECHISTE', $roles)) {
            return $this->redirectToRoute('catechiste_dashboard');
        } elseif (in_array('ROLE_CATECHUMENE', $roles)) {
            return $this->redirectToRoute('catechumene_dashboard');
        }

        // Fallback pour ROLE_USER
        return $this->render('dashboard/index.html.twig');
    }

    #[Route('/admin/dashboard', name: 'admin_dashboard')]
    #[IsGranted('ROLE_ADMINISTRATEUR')]
    public function adminDashboard(): Response
    {
        return $this->render('dashboard/admin.html.twig');
    }

    #[Route('/catechiste/dashboard', name: 'catechiste_dashboard')]
    #[IsGranted('ROLE_CATECHISTE')]
    public function catechisteDashboard(): Response
    {
        return $this->render('dashboard/catechiste.html.twig');
    }

    #[Route('/catechumene/dashboard', name: 'catechumene_dashboard')]
    #[IsGranted('ROLE_CATECHUMENE')]
    public function catechumeneDeashboard(): Response
    {
        return $this->render('dashboard/catechumene.html.twig');
    }
}
