<?php

declare(strict_types=1);

namespace Everlution\FileJet\Management;

interface RemoteStorage
{
    public function getId(): string;

    public function getApiKey(): string;
}
