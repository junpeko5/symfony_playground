<?php

declare(strict_types=1);

namespace App\Domain\Category\Repository;

use App\Domain\Category\Model\Category;

interface CategoryRepository
{
    public function find($id);

    public function findAll();

    public function getAll(): array;

    public function save(Category $blogPost);
}
