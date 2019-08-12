<?php

declare(strict_types=1);

namespace App\UI\Controller\http;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index()
    {

        return $this->render('frontend/home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }
}
