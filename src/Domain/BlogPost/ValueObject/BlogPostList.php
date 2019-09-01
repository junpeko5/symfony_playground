<?php

declare(strict_types=1);

namespace App\Domain\BlogPost\ValueObject;

use App\Domain\BlogPost\Model\BlogPost;
use Doctrine\Common\Collections\ArrayCollection;

class BlogPostList
{
    private $blogPostList;

    public function __construct(array $blogPostList)
    {
        $this->blogPostList = new ArrayCollection($blogPostList);
    }

    public function addBlogPostList(BlogPost $blogPost): self
    {
        if (!$this->blogPostList->contains($blogPost)) {
            $this->blogPostList[] = $blogPost;
        }
        return $this;
    }
}
