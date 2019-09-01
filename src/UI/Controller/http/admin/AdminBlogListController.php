<?php

declare(strict_types=1);

namespace App\UI\Controller\http\admin;

use App\Application\UseCases\BlogPost\ShowBlogListScenario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminBlogListController extends AbstractController
{
    /**
     * @var ShowBlogListScenario
     */
    private $useCase;

    public function __construct(ShowBlogListScenario $useCase)
    {
        $this->useCase = $useCase;
    }

    /**
     * @Route("/admin/blog/list", name="admin_blog_list")
     */
    public function __invoke()
    {
        $blogList = $this->useCase->handle();

        return $this->render('admin/blog_post_list.html.twig', [
            'blogList' => $blogList,
        ]);
    }
}
