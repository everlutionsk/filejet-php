<?php

declare(strict_types=1);

namespace Everlution\FileJet;

final class FileImpl implements File
{
    /** @var string */
    private $identifier;
    /** @var null|string */
    private $mutation;

    public function __construct(string $identifier, ?string $mutation)
    {
        $this->identifier = $identifier;
        $this->mutation = $mutation;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getMutation(): ?string
    {
        return $this->mutation;
    }
}
