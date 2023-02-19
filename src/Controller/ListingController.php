<?php

namespace App\Controller;

use App\Exception\InvalidDateParameterException;
use App\Exception\SearchRequestMissingParameterException;
use App\Repository\ListingRepository;
use App\Trait\ValidatesSearchRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\JsonException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ListingController extends AbstractController
{
    use ValidatesSearchRequest;

    public function __construct(
        protected ListingRepository $listingRepository
    )
    {}

    #[Route('/listing/search', name: 'listing_search', methods: ['POST'])]
    public function search(Request $request): JsonResponse
    {
        try {
            $requestAsArray = $request->toArray();
            $this->validateRequest($requestAsArray);

            $listings = $this->listingRepository->findAvailableListingsByDateRange(
                $requestAsArray['startDate'],
                $requestAsArray['endDate']
            );

            return $this->json(compact('listings'));
        } catch (JsonException $e) {
            return $this->json([
                'message' => $e->getMessage()
            ], 400);
        } catch (SearchRequestMissingParameterException $e) {
            return $this->json([
                'message' => $e->getMessage(),
                'field'   => $e->getField()
            ], $e->getCode());
        } catch (InvalidDateParameterException $e) {
            return $this->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    #[Route('/listing/detail/{id}', name: 'listing_detail', methods: ['GET'])]
    public function detail($id): JsonResponse
    {
        $listing = $this->listingRepository->findOneBy(['id' => $id]);

        if (empty($listing)) {
            return $this->json([
                'message'   =>  'Listing not found!'
            ], 404);
        }

        return $this->json([
            'listing' => $listing->toArray()
        ]);
    }
}
