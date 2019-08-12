<?php

declare(strict_types=1);

namespace App\Application\Query\BlogPost;

use App\Application\Query\Query;

class ShowBlogPostBySlug implements Query
{
    private $slug;

    public function __construct(string $slug)
    {
        $this->slug = $slug;
    }

    public function getSlug() :string
    {
        return $this->slug;
    }
}
