<?php

declare(strict_types=1);

namespace QZCloudApi;

use QZCloudApi\HyperY\HyperY;

class Client
{
    private function hyperY(...$params): HyperY
    {
        return new HyperY(...$params);
    }

    // 调用实际类的方法
    public static function __callStatic($method, $params)
    {
        // 检查方法是否存在
        if (method_exists(__CLASS__, $method)) {
            return call_user_func_array([__CLASS__, $method], $params);
        }
        throw new \BadMethodCallException("Method $method does not exist.");
    }
}
