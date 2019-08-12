<?php

namespace App\UI\Controller\http;

use App\Application\UseCases\User\GetLoginUserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    private $useCase;

    public function __construct(GetLoginUserService $useCase)
    {
        $this->useCase = $useCase;
    }

    /**
     * @Route("/login", name="admin_login")
     * @return Response
     */
    public function login(): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('home_page');
        }

        $this->useCase->execute();

        return $this->render('frontend/security/login.html.twig',
            [
                'last_username' => $this->useCase->getLastUserName(),
                'error' => $this->useCase->getError(),
            ]
        );
    }
}
