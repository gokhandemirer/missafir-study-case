<?php

namespace App\Trait;

use App\Exception\InvalidDateParameterException;
use App\Exception\SearchRequestMissingParameterException;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

trait ValidatesSearchRequest
{
    /**
     * @param array $requestAsArray
     * @return void
     * @throws InvalidDateParameterException
     * @throws SearchRequestMissingParameterException
     */
    protected function validateRequest(array $requestAsArray)
    {
        $validator = Validation::createValidator();
        $groups = new Assert\GroupSequence(['Default', 'custom']);

        $constraint = new Assert\Collection([
            'startDate' => new Assert\Date(),
            'endDate'   => new Assert\Date()
        ]);

        $violations = $validator->validate($requestAsArray, $constraint, $groups);

        if ($violations->count()) {
            $exception = new SearchRequestMissingParameterException($violations->get(0)->getMessage(), 422);
            $exception->setField($violations->get(0)->getPropertyPath());

            throw $exception;
        }

        if ($requestAsArray['startDate'] >= $requestAsArray['endDate']) {
            throw new InvalidDateParameterException('Start date must be less than end date');
        }
    }
}