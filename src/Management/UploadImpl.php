<?php

declare(strict_types=1);

namespace Everlution\FileJet\Management;

use Everlution\FileJet\FileJet;
use Psr\Http\Message\ResponseInterface;

final class UploadImpl implements Upload
{
    /** @var HttpClient */
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function explicit(UploadRequest $request, RemoteStorage $storage): UploadResponse
    {
        $response = $this->httpClient->sendRequest(
            HttpClient::METHOD_POST,
            $this->toUri($storage, 'upload/explicit'),
            $this->toHeaders($storage),
            $this->toBody($request)
        );

        return $this->toUploadResponse($response);
    }

    public function unique(UploadRequest $request, RemoteStorage $storage): UploadResponse
    {
        $response = $this->httpClient->sendRequest(
            HttpClient::METHOD_POST,
            $this->toUri($storage, 'upload/unique'),
            $this->toHeaders($storage),
            $this->toBody($request)
        );

        return $this->toUploadResponse($response);
    }

    private function toUri(RemoteStorage $storage, string $endpoint): string
    {
        $storageManagerUrl = FileJet::STORAGE_MANAGER_ULR;

        return "$storageManagerUrl/v1/storage/{$storage->getId()}/$endpoint";
    }

    private function toHeaders(RemoteStorage $storage): array
    {
        return [
            'Authorization' => $storage->getApiKey(),
            'Content-Type' => 'application/json',
        ];
    }

    private function toBody(UploadRequest $request): string
    {
        return json_encode([
            'path' => $request->getPath(),
            'contentType' => $request->getContentType(),
            'expires' => $request->getTtl(),
        ]);
    }

    private function toUploadResponse(ResponseInterface $response): UploadResponse
    {
        $data = json_decode($response->getBody()->getContents(), true);
        $requestFormat = $data['requestFormat'];

        return new UploadResponseImpl(
            $data['identifier'],
            new StorageUploadRequestImpl(
                $requestFormat['url'],
                $requestFormat['httpMethod'],
                $requestFormat['headers']
            )
        );
    }
}
