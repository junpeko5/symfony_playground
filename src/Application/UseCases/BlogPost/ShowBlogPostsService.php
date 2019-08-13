<?php

declare(strict_types=1);

namespace App\Application\UseCases\BlogPost;

use App\Application\UseCases\UseCasesService;
use App\Domain\User\Repository\BlogPostRepository;

class ShowBlogPostsService implements UseCasesService
{
    private $blogPostRepository;

    public function __construct(BlogPostRepository $blogPostRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
    }

    public function handle()
    {
        $blogPost = $this->blogPostRepository->findAll();
        return $blogPost;
    }
}
