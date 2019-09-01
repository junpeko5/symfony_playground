<?php

declare(strict_types=1);

namespace App\Domain\BlogPost\Model;

use App\Domain\User\Model\User;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class BlogPost
 * @package App\Domain\BlogPost\Model
 */
class BlogPost
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $user;

    /**
     * @var
     */
    private $title;

    /**
     * @var
     */
    private $content;

    /**
     * @var
     */
    private $slug;

    /**
     * @var
     */
    private $createdAt;

    /**
     * @var
     */
    private $updatedAt;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return BlogPost
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return BlogPost
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return BlogPost
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface $createdAt
     * @return BlogPost
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTimeInterface $updated_at
     * @return BlogPost
     */
    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updatedAt = $updated_at;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param UserInterface $user
     * @return BlogPost
     */
    public function setUser(UserInterface $user): self
    {
        $this->user = $user;

        return $this;
    }
}
