<?php

declare(strict_types=1);

namespace App\UI\Controller\http;

use App\Application\UseCases\BlogPost\ShowBlogPostsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShowBlogPostsController extends AbstractController
{
    /**
     * @var ShowBlogPostsService
     */
    private $useCase;

    public function __construct(ShowBlogPostsService $useCase)
    {
        $this->useCase = $useCase;
    }

    /**
     * @Route("/blog", name="show_blog_posts")
     */
    public function index()
    {
        $blogPosts = $this->useCase->handle();

        return $this->render('frontend/blog_post/showBlogPosts.html.twig', [
            'blog_posts' => $blogPosts,
        ]);
    }
}
