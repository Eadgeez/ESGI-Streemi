<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
class AuthController extends AbstractController
{
    #[Route('/confirm', name: 'confirm')]
    public function confirm()
    {
        return $this->render('auth/confirm.html.twig');
    }

    #[Route('/forgot', name: 'forgot')]
    public function forgot()
    {
        return $this->render('auth/forgot.html.twig');
    }

    #[Route('/login', name: 'login')]
    public function login()
    {
        return $this->render('auth/login.html.twig');
    }

    #[Route('/register', name: 'register')]
    public function register()
    {
        return $this->render('auth/register.html.twig');
    }

    #[Route('/reset', name: 'reset')]
    public function reset()
    {
        return $this->render('auth/reset.html.twig');
    }
}
