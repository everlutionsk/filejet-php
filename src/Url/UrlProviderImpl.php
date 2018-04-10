<?php

declare(strict_types=1);

namespace Everlution\FileJet\Url;

use Everlution\FileJet\Config\Storage;
use Everlution\FileJet\File;

final class UrlProviderImpl implements UrlProvider
{
    public function toUrl(File $file, Storage $storage): string
    {
        $filePath = $file->getMutation() ? $this->toMutatedPath($file) : $this->toOriginPath($file);

        return "{$storage->getPublicUri()}/{$filePath}";
    }

    private function toMutatedPath(File $file)
    {
        $filename = basename($file->getIdentifier());

        return "mutated/{$file->getIdentifier()}/{$file->getMutation()}/$filename";
    }

    private function toOriginPath(File $file)
    {
        return $file->getIdentifier();
    }
}
