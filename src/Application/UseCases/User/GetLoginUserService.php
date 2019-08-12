<?php

declare(strict_types=1);

namespace App\Application\UseCases\User;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class GetLoginUserService
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

    /**
     * @return string | null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return string
     */
    public function getLastUserName() :string
    {
        return $this->lastUserName;
    }
}
