<?php

declare(strict_types=1);

namespace Everlution\FileJet\Management;

interface Deletion
{
    public function delete(string $fileIdentifier, RemoteStorage $storage): DeleteResponse;
}
