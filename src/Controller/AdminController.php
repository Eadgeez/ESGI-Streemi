<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function admin()
    {
        return $this->render('admin/admin.html.twig');
    }

    #[Route('/admin/users', name: 'admin_users')]
    public function users()
    {
        return $this->render('admin/admin_users.html.twig');
    }

    #[Route('/admin/films', name: 'admin_films')]
    public function films()
    {
        return $this->render('admin/admin_films.html.twig');
    }

    #[Route('/admin/films/add', name: 'admin_add_films')]
    public function addFilm()
    {
        return $this->render('admin/admin_add_films.html.twig');
    }
}
