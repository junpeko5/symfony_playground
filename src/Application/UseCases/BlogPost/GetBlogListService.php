<?php

declare(strict_types=1);

namespace App\Application\UseCases\BlogPost;

use App\Application\UseCases\UseCasesService;
use App\Domain\User\Repository\BlogPostRepository;

class GetBlogListService implements UseCasesService
{
    /**
     * @var BlogPostRepository
     */
    private $blogPostRepository;

    /**
     * GetBlogListService constructor.
     * @param BlogPostRepository $blogPostRepository
     */
    public function __construct(BlogPostRepository $blogPostRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
    }

    /**
     * @return mixed
     */
    public function getBlogPostList()
    {
        return $this->blogPostRepository->findAll();
    }
}
