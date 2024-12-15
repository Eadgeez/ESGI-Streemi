<?php

declare(strict_types=1);

namespace App\Controller\Movie;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MovieController extends AbstractController
{
    public function __construct(private readonly MovieRepository $movieRepository)
    {
    }

    #[Route('/movie/{id}', name: 'movie_detail')]
    public function detail( int $id ): Response
    {
        $movie = $this->movieRepository->find($id);

        if (!$movie) {
            throw $this->createNotFoundException('The movie does not exist');
        }

        return $this->render('movie/detail.html.twig', [
            'title' => $movie->getTitle(),
            'resume' => $movie->getShortDescription(),
            'description' => $movie->getLongDescription(),
            'image_path' => $movie->getCoverImage(),
        ]);
    }

    #[Route('/serie/{id}', name: 'serie_detail')]
    public function serieDetail(): Response
    {
        return $this->render('movie/detail_serie.html.twig');
    }
}
