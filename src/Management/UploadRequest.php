<?php

declare(strict_types=1);

namespace Everlution\FileJet\Management;

interface UploadRequest
{
    public const DEFAULT_TTL_IN_SECONDS = 60;

    public function getPath(): string;

    public function getContentType(): string;

    public function getTtl(): int;
}
