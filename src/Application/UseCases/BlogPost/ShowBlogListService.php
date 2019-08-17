<?php

declare(strict_types=1);

namespace App\Application\UseCases\BlogPost;

use App\Application\UseCases\UseCasesService;
use App\Domain\User\Repository\BlogPostRepository;

class ShowBlogListService implements UseCasesService
{
    /**
     * @var BlogPostRepository
     */
    private $blogPostRepository;

    /**
     * ShowBlogListService constructor.
     * @param BlogPostRepository $blogPostRepository
     */
    public function __construct(BlogPostRepository $blogPostRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        return $this->blogPostRepository->findAll();
    }
}
