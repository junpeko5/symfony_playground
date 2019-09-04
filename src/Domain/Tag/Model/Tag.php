<?php

declare(strict_types=1);

namespace App\Domain\Tag\Model;

use App\Domain\BlogPost\Model\BlogPost;

class Tag
{
    private $id;

    private $name;

    private $blogPost;

    private $createdAt;

    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBlogPost(): ?BlogPost
    {
        return $this->blogPost;
    }

    public function setBlogPost(BlogPost $blogPost): self
    {
        $this->blogPost = $blogPost;

        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updatedAt = $updated_at;

        return $this;
    }

    public function setTag(Tag $tag): self
    {
        $this->tag = $tag;

        return $this;
    }
}
