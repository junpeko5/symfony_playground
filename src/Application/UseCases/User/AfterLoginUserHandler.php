<?php

declare(strict_types=1);

namespace App\Application\UseCases\User;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AfterLoginUserHandler
{
    /**
     * @var AuthenticationUtils
     */
    private $authenticationUtils;

    /**
     * @var string | null
     */
    private $error;

    /**
     * @var string
     */
    private $email;

    /**
     * AfterLoginUserHandler constructor.
     * @param AuthenticationUtils $authenticationUtils
     */
    public function __construct(AuthenticationUtils $authenticationUtils)
    {
        $this->authenticationUtils = $authenticationUtils;
    }

    /**
     *
     */
    public function execute()
    {
        $this->error = $this->authenticationUtils->getLastAuthenticationError();
        $this->email = $this->authenticationUtils->getLastUsername();
    }

    /**
     * @return string | null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
}
