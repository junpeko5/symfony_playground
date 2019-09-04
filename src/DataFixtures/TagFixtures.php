<?php

namespace App\DataFixtures;

use App\Domain\Tag\Model\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class TagFixtures
 * @package App\DataFixtures
 */
class TagFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @var BlogPostFixtures
     */
    private $blogPostFixtures;

    private $faker;

    private const TAGS = [
        [
            'name' => 'PHP',
        ],
        [
            'name' => 'Ruby',
        ],
        [
            'name' => 'Python',
        ],
        [
            'name' => 'Go',
        ],
        [
            'name' => 'JavaScript',
        ],
    ];


    public function __construct(
        BlogPostFixtures $blogPostFixtures
    )
    {
        $this->blogPostFixtures = $blogPostFixtures;
        $this->faker = Factory::create();
    }

    /**
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5; $i++) {
            $Tag = new Tag();
            $Tag->setName(self::TAGS[$i]['name']);
            $Tag->setCreatedAt($this->faker->dateTimeThisYear);
            $Tag->setUpdatedAt($this->faker->dateTimeThisYear);
            $Tag->setBlogPost($this->blogPostFixtures->getRandomBlogPostReference());
            $manager->persist($Tag);
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
            BlogPostFixtures::class,
        );
    }
}
