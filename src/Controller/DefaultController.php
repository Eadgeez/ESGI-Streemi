<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    public function __construct(private readonly MovieRepository $movieRepository)
    {
    }

    #[Route('/', name: 'default')]
    public function index(): Response
    {
        $movies = $this->movieRepository->findAll();

    return $this->render('index.html.twig', [
            'movies' => $movies
        ]);
    }
}