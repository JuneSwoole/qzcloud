<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Models\Request;
use QZCloudApi\Interfaces\HttpRequestInterface;

/**
 * 云主机状态设置
 *
 * @author juneChen <juneswoole@163.com>
 */
class SetStateHyperVRequest extends Request implements HttpRequestInterface
{

    // 云主机标识
    protected $vm_name = '';

    // 状态类型：2（开机），3（断电），4（关机），11（重启）
    protected $state;

    public function __construct(array $data = [])
    {
        $this->fromMap($data);
    }
}
