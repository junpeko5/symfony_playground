<?php

declare(strict_types=1);

namespace App\UI\Controller\http;

use App\Application\UseCases\BlogPost\ShowBlogListScenario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShowBlogListController extends AbstractController
{
    /**
     * @var ShowBlogListScenario
     */
    private $useCase;

    public function __construct(ShowBlogListScenario $useCase)
    {
        $this->useCase = $useCase;
    }

    /**
     * @Route("/blog", name="show_blog_posts")
     */
    public function __invoke()
    {
        $blogList = $this->useCase->handle();

        return $this->render('frontend/blog_post/showBlogPosts.html.twig', [
            'blogList' => $blogList,
        ]);
    }
}
