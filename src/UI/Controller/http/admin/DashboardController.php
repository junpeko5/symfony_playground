<?php

declare(strict_types=1);

namespace App\UI\Controller\http\admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/admin/dashboard", name="dashboard")
     */
    public function index()
    {
        return $this->render('admin/dashboard.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }
}
