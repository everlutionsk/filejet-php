<?php

declare(strict_types=1);

namespace Tests\Everlution\FileJet\Management;

use Everlution\FileJet\Management\RemoteStorage;

class RemoteStorageMock implements RemoteStorage
{
    public function getId(): string
    {
        return 'testStorageIdentifier';
    }

    public function getApiKey(): string
    {
        return 'testApiKey';
    }
}
