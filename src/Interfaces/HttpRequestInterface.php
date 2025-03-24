<?php

namespace QZCloudApi\Interfaces;

interface HttpRequestInterface
{
    public function toMap(): array;
    public function fromMap(array $map): void;
}
