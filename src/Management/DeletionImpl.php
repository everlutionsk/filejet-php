<?php

declare(strict_types=1);

namespace Everlution\FileJet\Management;

use Everlution\FileJet\FileJet;

final class DeletionImpl implements Deletion
{
    /** @var HttpClient */
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function delete(string $fileIdentifier, RemoteStorage $storage): DeleteResponse
    {
        $response = $this->httpClient->sendRequest(
            HttpClient::METHOD_DELETE,
            $this->toUri($fileIdentifier, $storage),
            $this->toHeaders($storage)
        );

        return new DeleteResponseImpl($response);
    }

    private function toUri(string $fileIdentifier, RemoteStorage $storage)
    {
        $encodedIdentifier = urlencode($fileIdentifier);
        $storageManagerUrl = FileJet::STORAGE_MANAGER_ULR;

        return "$storageManagerUrl/v1/storage/{$storage->getId()}/file/$encodedIdentifier";
    }

    private function toHeaders(RemoteStorage $storage): array
    {
        return [
            'Authorization' => $storage->getApiKey(),
        ];
    }
}
