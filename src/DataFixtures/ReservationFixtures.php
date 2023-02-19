<?php

namespace App\DataFixtures;

use App\Entity\Reservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ReservationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $reservation = new Reservation();
            $reservation->setStartDate($faker->dateTimeBetween('-5 weeks', '-3 weeks'));
            $reservation->setEndDate($faker->dateTimeBetween('-3 weeks'));
            $reservation->setListing($this->getReference(ListingFixtures::LISTING_REFERENCE . '-' . rand(0, 3)));
            $manager->persist($reservation);
        }

        $manager->flush();
    }
}
