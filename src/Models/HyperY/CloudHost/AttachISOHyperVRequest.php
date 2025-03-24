<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Models\Request;

/**
 * 云主机 挂载或者卸载iso文件
 *
 * @author juneChen <juneswoole@163.com>
 */
class AttachISOHyperVRequest extends Request implements HttpRequestInterface
{
    // 云主机标识
    protected $vm_name;
    // iso文件路径
    protected $iso_path;

    public function __construct(array $data = [])
    {
        $this->fromMap($data);
    }
}
