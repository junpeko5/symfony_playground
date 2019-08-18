<?php

declare(strict_types=1);

namespace App\Application\UseCases\BlogPost;

use App\Application\UseCases\UseCasesService;
use App\Application\UseCases\BlogPost\GetBlogListService;
use App\Domain\BlogPost\Model\DatetimeFormat;

class ShowBlogListScenario implements UseCasesService
{
    /**
     * @var GetBlogListService
     */
    private $queryService;

    private $datetimeFormat;

    public function __construct(GetBlogListService $queryService, DatetimeFormat $datetimeFormat)
    {
        $this->queryService = $queryService;
        $this->datetimeFormat = $datetimeFormat;
    }

    public function handle()
    {
        $blogPosts = $this->queryService->getBlogPostList();
        return $blogPosts;
//        $this->queryService->Appearance();
    }
}
