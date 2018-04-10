<?php

declare(strict_types=1);

namespace Everlution\FileJet\Management;

interface UploadResponse
{
    public function getFileIdentifier(): string;

    public function getStorageRequest(): StorageUploadRequest;
}
