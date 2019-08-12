<?php

namespace App\UI\Controller\http;

use App\Application\UseCases\User\LoginUserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="admin_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
         if ($this->getUser()) {
            return $this->redirectToRoute('home_page');
         }

        $loginService = new LoginUserService($authenticationUtils);

        $loginService->execute();

        return $this->render('frontend/security/login.html.twig',
            [
                'last_username' => $loginService->getLastUserName(),
                'error' => $loginService->getError(),
            ]
        );
    }
}
