<?php

declare(strict_types=1);

namespace App\Controller\Movie;

use App\Entity\Movie;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CategoryController extends AbstractController
{
    public function __construct(private readonly CategoryRepository $categoryRepository)
    {
    }

    #[Route('/category/{id}', name: 'category')]
    public function category(int $id): Response
    {
        $category = $this->categoryRepository->find($id);
        $categories = $this->categoryRepository->findAll();

        if ($category === null) {
            throw $this->createNotFoundException('Category not found');
        }

        $movies = $category->getMovies();
        $randomMovies = array_rand($movies->toArray(), 3);
        $recommendedMovies = array_map(fn($index) => $movies->get($index), $randomMovies);

        return $this->render('movie/category.html.twig', [
            'categories' => $categories,
            'category' => $category,
            'movies' => $movies,
            'recommendedMovies' => $recommendedMovies,
        ]);
    }

    #[Route('/discover', name: 'discover')]
    public function discover(): Response
    {
        return $this->render('movie/discover.html.twig', [
            'categories' => $this->categoryRepository->findAll(),
        ]);
    }
}
