<?php

declare(strict_types=1);

namespace QZCloudApi\Models;

class Body
{

    private $body;

    public function toMap(): array
    {
        $map = [];
        foreach (get_object_vars($this) as $key => $value) {
            if ($value !== null) $map[$key] = $value;
        }
        return $map;
    }

    public function fromMap($map)
    {
        if (is_array($map)) {
            $body = [];
            foreach ($map as $key => $value) {
                if (property_exists($this, (string)$key)) {
                    $this->$key = $value;
                } else {
                    $body[$key] = $value;
                }
            }
            if (!empty($body)) $this->body = $body;
        } else {
            $this->body = $map;
        }
        return $this;
    }

    public function toArray(): array
    {
        $map = [];
        foreach (get_object_vars($this) as $key => $value) {
            $map[$key] = $value;
        }
        return $map;
    }
}
