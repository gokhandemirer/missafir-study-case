<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "date")]
    private ?\DateTime $startDate = null;

    #[ORM\Column(type: "date")]
    private ?\DateTime $endDate = null;

    #[ORM\ManyToOne(targetEntity: "App\Entity\Listing", inversedBy: "reservations")]
    private ?Listing $listing;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return \DateTime|null
     */
    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime|null $startDate
     */
    public function setStartDate(?\DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \DateTime|null
     */
    public function getEndDate(): ?\DateTime
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime|null $endDate
     */
    public function setEndDate(?\DateTime $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return Listing|null
     */
    public function getListing(): ?Listing
    {
        return $this->listing;
    }

    /**
     * @param Listing|null $listing
     */
    public function setListing(?Listing $listing): void
    {
        $this->listing = $listing;
    }
}
