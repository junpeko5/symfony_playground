<?php

declare(strict_types=1);

namespace App\Domain\User\Repository;

use App\Domain\BlogPost\Model\BlogPost;

interface BlogPostRepository
{
    public function find($id);

    public function findAll();

    public function findBy(array $criteria);

    public function findBlogPostBySlug(string $slug);

    public function getAll(): array;

    public function save(BlogPost $blogPost);
}
