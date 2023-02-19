<?php

namespace App\Entity;

use App\Enum\ListingType;
use App\Repository\ListingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListingRepository::class)]
class Listing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $type = null;

    #[ORM\Column(length: 255)]
    private ?string $owner = null;

    #[ORM\OneToMany(targetEntity: "App\Entity\Reservation", mappedBy: 'listing')]
    private $reservations;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getOwner(): ?string
    {
        return $this->owner;
    }

    public function setOwner(string $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReservations()
    {
        return $this->reservations;
    }

    private function getTypeName(): ?string
    {
        return ListingType::tryFrom($this->type)->name;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return  [
            'id'        =>      $this->getId(),
            'title'     =>      $this->getTitle(),
            'type'      =>      $this->getTypeName(),
            'owner'     =>      $this->getOwner()
        ];
    }
}
