<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Models\Request;

/**
 * 同步宿主机机时间
 *
 * @author juneChen <juneswoole@163.com>
 */
class SyncTimeHyperVRequest extends Request implements HttpRequestInterface
{
    // 云主机标识
    protected $vm_name;

    protected $state;

    public function __construct(array $data = [])
    {
        $this->fromMap($data);
    }
}
