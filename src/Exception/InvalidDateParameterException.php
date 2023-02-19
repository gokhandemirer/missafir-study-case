<?php

declare(strict_types=1);

namespace App\Exception;

use Symfony\Component\HttpFoundation\Exception\RequestExceptionInterface;

final class InvalidDateParameterException extends \Exception implements RequestExceptionInterface
{
}