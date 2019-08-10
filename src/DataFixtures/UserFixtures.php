<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $User = new User();
        $User->setEmail('brad@gmail.com');
        $password = $this->passwordEncoder->encodePassword($User, 'password');
        $User->setPassword($password);
        $User->setRoles([User::ROLE_ADMIN]);
        $manager->persist($User);
        $manager->flush();

        $User = new User();
        $User->setEmail('jun@gmail.com');
        $password = $this->passwordEncoder->encodePassword($User, 'password');
        $User->setPassword($password);
        $User->setRoles([User::ROLE_USER]);
        $manager->persist($User);
        $manager->flush();
    }
}
