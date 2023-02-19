<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ListingController extends AbstractController
{
    #[Route('/listing/search', name: 'listing_search', methods: ['POST'])]
    public function search(Request $request): JsonResponse
    {
        return $this->json(['message' => 'OK']);
    }
}
