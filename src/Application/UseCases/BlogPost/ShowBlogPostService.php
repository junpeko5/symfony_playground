<?php

declare(strict_types=1);

namespace App\Application\UseCases\BlogPost;

use App\Application\UseCases\UseCasesService;
use App\Domain\User\Repository\BlogPostRepository;
use App\Application\Query\BlogPost\ShowBlogPostBySlug;

class ShowBlogPostService implements UseCasesService
{
    private $blogPostRepository;

    public function __construct(BlogPostRepository $blogPostRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
    }

    public function getBlogPostBySlug(ShowBlogPostBySlug $query)
    {
        $blogPost = $this->blogPostRepository->findBlogPostBySlug($query->getSlug());
        return $blogPost;
    }
}
