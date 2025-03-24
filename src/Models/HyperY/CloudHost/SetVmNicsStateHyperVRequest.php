<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Models\Request;

/**
 * 设置网络状态
 *
 * @author juneChen <juneswoole@163.com>
 */
class SetVmNicsStateHyperVRequest extends Request implements HttpRequestInterface
{
    // 云主机标识
    protected $vm_name;
    // 网络状态 1 打开 2 关闭
    protected $state;
    // VLAN ID
    protected $vlanid;

    public function __construct(array $data = [])
    {
        $this->fromMap($data);
    }
}
