<?php

namespace App\UI\Controller\http;

use App\Application\UseCases\User\GetLoginUserService;
use App\Domain\User\Model\User;
use App\Infrastructure\UserBundle\Form\LoginUserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    private $useCase;

    private $formFactory;

    public function __construct(GetLoginUserService $useCase, FormFactoryInterface $formFactory)
    {
        $this->useCase = $useCase;
        $this->formFactory = $formFactory;
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

        $form = $this->formFactory->createNamed('', LoginUserType::class, new User());

        return $this->render('frontend/security/login.html.twig',
            [
                'email' => $this->useCase->getEmail(),
                'error' => $this->useCase->getError(),
                'form' => $form->createView(),
            ]
        );
    }
}
