<?php

namespace App\Application\UseCases\User;

use App\Domain\User\Model\User;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginUserService
{
    private $authenticationUtils;

    private $error;

    private $lastUserName;

    public function __construct(AuthenticationUtils $authenticationUtils)
    {
        $this->authenticationUtils = $authenticationUtils;
    }

    public function execute()
    {
        $this->error = $this->authenticationUtils->getLastAuthenticationError();

        $this->lastUserName = $this->authenticationUtils->getLastUsername();
    }

    public function getError()
    {
        return $this->error;
    }

    public function getLastUserName()
    {
        return $this->lastUserName;
    }
}
