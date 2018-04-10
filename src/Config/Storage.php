<?php

declare(strict_types=1);

namespace Everlution\FileJet\Config;

interface Storage
{
    public function getId(): string;

    public function getApiKey(): string;

    public function getPublicUri(): string;
}
