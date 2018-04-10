<?php

declare(strict_types=1);

namespace Everlution\FileJet\Management;

use Psr\Http\Message\ResponseInterface;

interface HttpClient
{
    public const METHOD_POST = 'POST';
    public const METHOD_DELETE = 'DELETE';

    /**
     * @param string $method
     * @param string $uri
     * @param array $headers
     * @param string|null $body
     * @return ResponseInterface
     * @throws RemoteFileJetException
     */
    public function sendRequest(
        string $method,
        string $uri,
        array $headers = [],
        string $body = null
    ): ResponseInterface;
}
