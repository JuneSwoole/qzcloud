<?php

declare(strict_types=1);

/**
 * 小驼峰命名转换为下划线命名
 *
 * @param string $name
 * @return string
 * @author juneChen <juneswoole@163.com>
 */
function camelCaseToUnderscore(string $name): string
{
    return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $name));
}
