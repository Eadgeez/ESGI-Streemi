<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
class MovieController extends AbstractController
{
    #[Route('/category', name: 'category')]
    public function category()
    {
        return $this->render('movie/category.html.twig');
    }

    #[Route('/detail', name: 'detail')]
    public function detail()
    {
        return $this->render('movie/detail.html.twig');
    }

    #[Route('/serie_detail', name: 'serie_detail')]
    public function serieDetail()
    {
        return $this->render('movie/serie_detail.html.twig');
    }

    #[Route('/lists', name: 'lists')]
    public function lists()
    {
        return $this->render('movie/lists.html.twig');
    }

    #[Route('/discover', name: 'discover')]
    public function discover()
    {
        return $this->render('movie/discover.html.twig');
    }
}
