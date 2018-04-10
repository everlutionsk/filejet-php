<?php

declare(strict_types=1);

namespace Everlution\FileJet\Management;

use Psr\Http\Message\ResponseInterface;

class DeleteResponseImpl implements DeleteResponse
{
    /** @var ResponseInterface */
    private $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function isSuccessful(): bool
    {
        return $this->response->getStatusCode() === 200;
    }
}
