<?php

declare(strict_types=1);

namespace App\UI\Controller\http;

use App\Application\Query\BlogPost\ShowBlogPostBySlug;
use App\Application\UseCases\BlogPost\ShowBlogPostService;
use App\Infrastructure\Application\QueryBus\QueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogPostController extends AbstractController
{
    /**
     * @var ShowBlogPostService
     */
    private $useCase;

    public function __construct(ShowBlogPostService $useCase)
    {
        $this->useCase = $useCase;
    }

    /**
     * @Route("/blog/post", name="blog_post")
     */
    public function index()
    {


        return $this->render('frontend/blog_post/index.html.twig', [
            'controller_name' => 'BlogPostController',
        ]);
    }


    /**
     * @Route("/blog/{slug}", name="show_blog_post_by_slug")
     * @param string $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showBlogPost(string $slug)
    {
        $query = new ShowBlogPostBySlug($slug);
        $blogPost = $this->useCase->getBlogPostBySlug($query);
        return $this->render('frontend/blog_post/showBlogPost.html.twig', [
            'blog_post' => $blogPost,
        ]);
    }
}
