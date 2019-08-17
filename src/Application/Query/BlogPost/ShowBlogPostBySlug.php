<?php

declare(strict_types=1);

namespace App\Application\Query\BlogPost;

use App\Application\Query\Query;

class ShowBlogPostBySlug implements Query
{
    /**
     * @var string
     */
    private $slug;

    /**
     * ShowBlogPostBySlug constructor.
     * @param string $slug
     */
    public function __construct(string $slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getSlug() :string
    {
        return $this->slug;
    }
}
