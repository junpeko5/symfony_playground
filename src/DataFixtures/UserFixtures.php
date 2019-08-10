<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 2; $i++) {
            $User = new User();
            $User->setEmail('junpeko+'.$i.'@gmail.com');
            $User->setPassword('password');
            $User->setRoles([User::ROLE_ADMIN]);
            $manager->persist($User);
        }
        $manager->flush();
    }
}
