<?php

namespace App\UI\Controller\http;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogPostController extends AbstractController
{
    /**
     * @Route("/blog/post", name="blog_post")
     */
    public function index()
    {
        return $this->render('frontend/blog_post/index.html.twig', [
            'controller_name' => 'BlogPostController',
        ]);
    }
}
