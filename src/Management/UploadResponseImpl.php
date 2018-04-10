<?php

declare(strict_types=1);

namespace Everlution\FileJet\Management;

final class UploadResponseImpl implements UploadResponse
{
    /** @var string */
    private $identifier;
    /** @var StorageUploadRequest */
    private $storageRequest;

    public function __construct(string $identifier, StorageUploadRequest $storageRequest)
    {
        $this->identifier = $identifier;
        $this->storageRequest = $storageRequest;
    }

    public function getFileIdentifier(): string
    {
        return $this->identifier;
    }

    public function getStorageRequest(): StorageUploadRequest
    {
        return $this->storageRequest;
    }
}
