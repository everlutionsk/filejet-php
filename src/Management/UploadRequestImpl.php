<?php

declare(strict_types=1);

namespace Everlution\FileJet\Management;

final class UploadRequestImpl implements UploadRequest
{
    /** @var string */
    private $path;
    /** @var string */
    private $contentType;
    /** @var int */
    private $ttl;

    public function __construct(string $path, string $contentType, int $ttl = self::DEFAULT_TTL_IN_SECONDS)
    {
        $this->path = $path;
        $this->contentType = $contentType;
        $this->ttl = $ttl;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getContentType(): string
    {
        return $this->contentType;
    }

    public function getTtl(): int
    {
        return $this->ttl;
    }
}
