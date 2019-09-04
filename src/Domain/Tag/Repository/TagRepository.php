<?php

declare(strict_types=1);

namespace App\Domain\Tag\Repository;

use App\Domain\Tag\Model\Tag;

interface TagRepository
{
    public function find($id);

    public function findAll();

    public function getAll(): array;

    public function save(Tag $blogPost);
}
