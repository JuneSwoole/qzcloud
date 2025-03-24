<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Models\Request;
use QZCloudApi\Interfaces\HttpRequestInterface;

/**
 * 云主机 删除防火墙策略
 *
 * @author juneChen <juneswoole@163.com>
 */
class RemoveAclExtendedHyperVRequest extends Request implements HttpRequestInterface
{

    // 云主机标识
    protected $vm_name = '';

    // 策略名称
    protected $name = '';

    public function __construct(array $data = [])
    {
        $this->fromMap($data);
    }
}
