<?php

namespace App\DataFixtures;

use App\Domain\BlogPost\Model\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

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

    private $faker;

    /**
     * BlogPostFixtures constructor.
     * @param UserFixtures $userFixtures
     */
    public function __construct(UserFixtures $userFixtures)
    {
        $this->userFixtures = $userFixtures;
        $this->faker = Factory::create();
    }

    /**
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 15; $i++) {
            $BlogPost = new BlogPost();
            $BlogPost->setTitle('title'. $i);
            $BlogPost->setContent($this->faker->text);
            $BlogPost->setSlug($this->faker->slug);
            $BlogPost->setCreatedAt($this->faker->dateTimeThisYear);
            $BlogPost->setUpdatedAt($this->faker->dateTimeThisYear);
            $BlogPost->setUser($this->userFixtures->getRandomUserReference());
            $this->addReference('blog_'.$i, $BlogPost);
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

    public function getRandomBlogPostReference(): object
    {
        return $this->getReference('blog_'. (string)rand(0, 14));
    }
}
