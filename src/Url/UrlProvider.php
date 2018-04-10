<?php

declare(strict_types=1);

namespace Everlution\FileJet\Url;

use Everlution\FileJet\Config\Storage;
use Everlution\FileJet\File;

interface UrlProvider
{
    public function toUrl(File $file, Storage $storage): string;
}
