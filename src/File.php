<?php

declare(strict_types=1);

namespace Everlution\FileJet;

interface File
{
    public function getIdentifier(): string;

    public function getMutation(): ?string;
}
