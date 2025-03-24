<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\HostMachine;

use QZCloudApi\Models\Request;
use QZCloudApi\Interfaces\HttpRequestInterface;

/**
 * 宿主机目录中的IOS文件列表
 *
 * @author juneChen <juneswoole@163.com>
 */
class GetISOListRequest extends Request implements HttpRequestInterface
{
    // 目录地址
    protected $iso_dir;

    public function __construct(array $data = [])
    {
        $this->fromMap($data);
    }
}
