<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BlogPostFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $BlogPost = new BlogPost();
        $BlogPost->setTitle('フリーランスになりました。');
        $BlogPost->setContent('Priceless widget!');
        $BlogPost->setSlug('test');
        $BlogPost->setCreatedAt(new \DateTime());
        $BlogPost->setUpdatedAt(new \DateTime());
        $manager->persist($BlogPost);
        $manager->flush();
    }
}
