<?php

declare(strict_types=1);

namespace App\Application\UseCases\BlogPost;

use App\Application\UseCases\UseCasesService;
use App\Application\UseCases\BlogPost\GetBlogListService;
use App\Domain\BlogPost\ValueObject\BlogPostList;

class ShowBlogListScenario implements UseCasesService
{
    /**
     * @var GetBlogListService
     */
    private $queryService;

    public function __construct(GetBlogListService $queryService)
    {
        $this->queryService = $queryService;
    }

    public function handle()
    {
        $blogList = $this->queryService->getBlogPostList();
        return $blogList;
    }
}
