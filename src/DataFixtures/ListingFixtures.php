<?php

namespace App\DataFixtures;

use App\Entity\Listing;
use App\Enum\ListingType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ListingFixtures extends Fixture
{
    public const LISTING_REFERENCE = 'reservation-listing';

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $listing = new Listing();
            $listing->setTitle("Listing $i");
            $listing->setOwner($faker->name);
            $listing->setType($this->getRandomListingType());
            $manager->persist($listing);

            $this->addReference(self::LISTING_REFERENCE . '-' . $i, $listing);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    private function getRandomListingType(): int
    {
        return ListingType::cases()[rand(0, count(ListingType::cases()) - 1)]->value;
    }
}
