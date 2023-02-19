<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ListingServiceTest extends WebTestCase
{
    public function testSearchEndpointReturnsSuccessfulResponse(): void
    {
        $client = static::createClient();
        $client->request('POST', '/listing/search', [
            'startDate' => '2023-02-19',
            'endDate'   => '2023-02-23'
        ]);

        $this->assertResponseIsSuccessful();
    }

    public function testSearchEndpointReturnsBadRequestResponse(): void
    {
        $client = static::createClient();
        $client->request('POST', '/listing/search'); // Request with empty body should be responded as bad request

        $this->assertResponseStatusCodeSame(400);
    }

    public function testSearchEndpointReturnsMissingParameterResponse(): void
    {
        $client = static::createClient();
        $client->request('POST', '/listing/search', [
            'startDate' => '2023-02-19'
        ]); // We did not send endDate parameter, so it should be responded as unprocessable entity

        $this->assertResponseStatusCodeSame(422);
    }
}
