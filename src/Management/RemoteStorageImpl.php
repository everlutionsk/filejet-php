<?php

declare(strict_types=1);

namespace Everlution\FileJet\Management;

final class RemoteStorageImpl implements RemoteStorage
{
    /** @var string */
    private $id;
    /** @var string */
    private $apiKey;

    public function __construct(string $id, string $apiKey)
    {
        $this->id = $id;
        $this->apiKey = $apiKey;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }
}
