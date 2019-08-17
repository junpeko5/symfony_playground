<?php

declare(strict_types=1);

namespace App\UI\Controller\http;

use App\Application\UseCases\BlogPost\ShowBlogPostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

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
     * @return Response
     */
    public function __invoke(string $slug)
    {
        $blogPost = $this->useCase->handle($slug);
        return $this->render('frontend/blog_post/showBlogPost.html.twig', [
            'blog_post' => $blogPost,
        ]);
    }
}
