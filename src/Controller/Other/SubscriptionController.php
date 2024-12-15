<?php

declare(strict_types=1);

namespace App\Controller\Other;

use App\Repository\SubscriptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SubscriptionController extends AbstractController
{
    public function __construct(private readonly SubscriptionRepository $subscriptionRepository)
    {
    }

    #[Route('/subscription', name: 'subscription')]
    public function index(): Response
    {
        $subscriptions = $this->subscriptionRepository->findAll();

        return $this->render('other/subscriptions.html.twig', [
            'subscriptions' => $subscriptions,
        ]);
    }
}
