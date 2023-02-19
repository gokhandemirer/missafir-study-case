<?php

declare(strict_types=1);

namespace App\Exception;

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;
use Symfony\Component\HttpFoundation\Exception\RequestExceptionInterface;

final class SearchRequestMissingParameterException extends \Exception implements RequestExceptionInterface
{
    /**
     * @var string
     */
    private string $field;

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @param string $field
     */
    public function setField(string $field): void
    {
        $this->field = $field;
    }
}