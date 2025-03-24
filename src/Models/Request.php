<?php

declare(strict_types=1);

namespace QZCloudApi\Models;

class Request
{

    public function toMap(): array
    {
        $map = [];
        foreach (get_object_vars($this) as $key => $value) {
            if ($value !== null) $map[$key] = $value;
        }
        return $map;
    }

    public function fromMap(array $map): void
    {
        foreach ($map as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
