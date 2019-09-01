<?php

namespace App\DataFixtures;

use App\Domain\User\Model\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use phpDocumentor\Reflection\Types\Object_;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserFixtures
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    private const USERS = [
        [
            'email' => 'brad@gmail.com',
            'password' => 'password',
            'roles' => [User::ROLE_ADMIN],
        ],
        [
            'email' => 'jun@gmail.com',
            'password' => 'password',
            'roles' => [User::ROLE_USER],
        ],
    ];

    /**
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->loadUsers($manager);
    }

    /**
     * @param ObjectManager $manager
     */
    public function loadUsers(ObjectManager $manager)
    {
        foreach (self::USERS as $userFixture) {
            $User = new User();
            $User->setEmail($userFixture['email']);
            $password = $this->passwordEncoder->encodePassword($User, $userFixture['password']);
            $User->setPassword($password);
            $User->setRoles($userFixture['roles']);
            $this->addReference($userFixture['email'], $User);
            $manager->persist($User);
            $manager->flush();
        }
    }

    /**
     * @return object
     */
    public function getRandomUserReference(): object
    {
        return $this->getReference(self::USERS[rand(0, 1)]['email']);
    }
}
