<?php

declare(strict_types=1);

namespace Everlution\FileJet\Management;

interface Upload
{
    public function explicit(UploadRequest $request, RemoteStorage $storage): UploadResponse;

    public function unique(UploadRequest $request, RemoteStorage $storage): UploadResponse;
}
