<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Models\Request;

/**
 * 获取源主机运行状态
 *
 * @author juneChen <juneswoole@163.com>
 */
class GetVmStateRequest extends Request implements HttpRequestInterface
{

    // 云主机标识
    protected $vm_name;

    public function __construct(array $data = [])
    {
        $this->fromMap($data);
    }
}
