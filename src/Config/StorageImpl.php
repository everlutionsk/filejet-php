<?php

declare(strict_types=1);

namespace Everlution\FileJet\Config;

final class StorageImpl implements Storage
{
    /** @var string */
    private $identifier;
    /** @var string */
    private $apiKey;
    /** @var string */
    private $publicUri;

    public function __construct(string $identifier, string $apiKey, string $publicUri)
    {
        $this->identifier = $identifier;
        $this->apiKey = $apiKey;
        $this->publicUri = $publicUri;
    }

    public function getId(): string
    {
        return $this->identifier;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function getPublicUri(): string
    {
        return $this->publicUri;
    }
}
