<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
class OtherController extends AbstractController
{
    #[Route('/upload', name: 'other')]
    public function other()
    {
        return $this->render('other/upload.html.twig');
    }

    #[Route('/subscription', name: 'subscription')]
    public function subscription()
    {
        return $this->render('other/subscription.html.twig');
    }

    #[Route('/default', name: 'default')]
    public function default()
    {
        return $this->render('other/default.html.twig');
    }
}
