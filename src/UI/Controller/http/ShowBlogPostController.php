<?php

declare(strict_types=1);

namespace App\UI\Controller\http;

use App\Application\Query\BlogPost\ShowBlogPostBySlug;
use App\Application\UseCases\BlogPost\ShowBlogPostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShowBlogPostController extends AbstractController
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
