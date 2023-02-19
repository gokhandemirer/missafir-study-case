<?php
declare(strict_types=1);

namespace App\Enum;

enum ListingType: int
{
    case ROOM = 1;
    case CONDO = 2;
    case APARTMENT = 3;
}