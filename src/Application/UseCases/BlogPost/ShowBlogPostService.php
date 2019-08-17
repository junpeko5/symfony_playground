<?php

declare(strict_types=1);

namespace App\Application\UseCases\BlogPost;

use App\Application\UseCases\UseCasesService;
use App\Domain\User\Repository\BlogPostRepository;
use App\Application\Query\BlogPost\ShowBlogPostBySlug;

class ShowBlogPostService implements UseCasesService
{
    /**
     * @var BlogPostRepository
     */
    private $blogPostRepository;

    /**
     * @var ShowBlogPostBySlug
     */
    private $query;

    /**
     * ShowBlogPostService constructor.
     * @param BlogPostRepository $blogPostRepository
     */
    public function __construct(BlogPostRepository $blogPostRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function handle($slug)
    {
        $this->query = new ShowBlogPostBySlug($slug);
        return $this->blogPostRepository->findBlogPostBySlug($this->query->getSlug());
    }
}
