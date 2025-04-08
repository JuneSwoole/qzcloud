<?php

declare(strict_types=1);

namespace QZCloudApi;

use QZCloudApi\HyperY\HyperY;

class Client
{
    public static function hyperY(...$params): HyperY
    {
        return new HyperY(...$params);
    }
}
