<?php

declare(strict_types=1);

namespace App\Controller\Movie;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ListController extends AbstractController
{
    public function __construct()
    {
    }

    #[Route('/lists', name: 'lists')]
    public function index(Request $request): Response
    {

        /** @var User $user */
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('login');
        }

        $playlists = $user->getPlaylists();
        $selectedPlaylistId = (int)$request->query->get('selectedPlaylist');

        $selectedPlaylist = $selectedPlaylistId ? [...array_filter($playlists->toArray(), function ($playlist) use ($selectedPlaylistId) { return $selectedPlaylistId === $playlist->getId(); })][0] : null;

        return $this->render('movie/lists.html.twig', [
            'playlists' => $playlists,
            'selectedPlaylist' => $selectedPlaylist ?? $playlists->toArray()[0],
        ]);
    }
}
