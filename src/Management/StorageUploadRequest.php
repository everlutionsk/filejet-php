<?php

declare(strict_types=1);

namespace Everlution\FileJet\Management;

interface StorageUploadRequest
{
    public function getUri(): string;

    public function getRequestMethod(): string;

    public function getHeaders(): array;
}
