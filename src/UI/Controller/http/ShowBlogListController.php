<?php

declare(strict_types=1);

namespace App\UI\Controller\http;

use App\Application\UseCases\BlogPost\ShowBlogListService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShowBlogListController extends AbstractController
{
    /**
     * @var ShowBlogListService
     */
    private $useCase;

    public function __construct(ShowBlogListService $useCase)
    {
        $this->useCase = $useCase;
    }

    /**
     * @Route("/blog", name="show_blog_posts")
     */
    public function __invoke()
    {
        $blogPosts = $this->useCase->handle();

        return $this->render('frontend/blog_post/showBlogPosts.html.twig', [
            'blog_posts' => $blogPosts,
        ]);
    }
}
