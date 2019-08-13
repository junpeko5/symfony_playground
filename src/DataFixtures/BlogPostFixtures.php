<?php

namespace App\DataFixtures;

use App\Domain\BlogPost\Model\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BlogPostFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 15; $i++) {
            $BlogPost = new BlogPost();
            $BlogPost->setTitle('フリーランスになりました。' . $i);
            $BlogPost->setContent('ブログ開設しました。今後とも宜しくお願いいたします。ブログ開設しました。今後とも宜しくお願いいたします。ブログ開設しました。今後とも宜しくお願いいたします。ブログ開設しました。今後とも宜しくお願いいたします。ブログ開設しました。今後とも宜しくお願いいたします。ブログ開設しました。今後とも宜しくお願いいたします。ブログ開設しました。今後とも宜しくお願いいたします。!');
            $BlogPost->setSlug('free' . $i);
            $BlogPost->setCreatedAt(new \DateTime());
            $BlogPost->setUpdatedAt(new \DateTime());
            $manager->persist($BlogPost);
        }

        $manager->flush();

//        $BlogPost = new BlogPost();
//        $BlogPost->setTitle('ブログ開設しました。');
//        $BlogPost->setContent('ブログ開設しました。今後とも宜しくお願いいたします。');
//        $BlogPost->setSlug('blog-start');
//        $BlogPost->setCreatedAt(new \DateTime());
//        $BlogPost->setUpdatedAt(new \DateTime());
//        $manager->persist($BlogPost);
//        $manager->flush();
    }
}
