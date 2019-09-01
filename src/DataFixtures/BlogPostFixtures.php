<?php

namespace App\DataFixtures;

use App\Domain\BlogPost\Model\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class BlogPostFixtures
 * @package App\DataFixtures
 */
class BlogPostFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @var UserFixtures
     */
    private $userFixtures;

    /**
     * BlogPostFixtures constructor.
     * @param UserFixtures $userFixtures
     */
    public function __construct(UserFixtures $userFixtures)
    {
        $this->userFixtures = $userFixtures;
    }

    /**
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 15; $i++) {
            $BlogPost = new BlogPost();
            $BlogPost->setTitle('フリーランスになりました。' . $i);
            $BlogPost->setContent('ブログ開設しました。今後とも宜しくお願いいたします。ブログ開設しました。今後とも宜しくお願いいたします。ブログ開設しました。今後とも宜しくお願いいたします。ブログ開設しました。今後とも宜しくお願いいたします。ブログ開設しました。今後とも宜しくお願いいたします。ブログ開設しました。今後とも宜しくお願いいたします。ブログ開設しました。今後とも宜しくお願いいたします。!');
            $BlogPost->setSlug('free' . $i);
            $BlogPost->setCreatedAt(new \DateTime());
            $BlogPost->setUpdatedAt(new \DateTime());
            $BlogPost->setUser($this->userFixtures->getRandomUserReference());
            $manager->persist($BlogPost);
        }
        $manager->flush();
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}
