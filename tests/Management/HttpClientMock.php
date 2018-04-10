<?php

declare(strict_types=1);

namespace Tests\Everlution\FileJet\Management;

use Everlution\FileJet\Management\HttpClient;
use Psr\Http\Message\ResponseInterface;

class HttpClientMock implements HttpClient
{
    /** @var ResponseInterface */
    private $expectedResponse;

    public function __construct(ResponseInterface $expectedResponse)
    {
        $this->expectedResponse = $expectedResponse;
    }

    public function sendRequest(
        string $method,
        string $uri,
        array $headers = [],
        string $body = null
    ): ResponseInterface {
        return $this->expectedResponse;
    }
}
