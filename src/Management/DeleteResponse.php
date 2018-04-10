<?php

declare(strict_types=1);

namespace Everlution\FileJet\Management;

interface DeleteResponse
{
    public function isSuccessful(): bool;
}
