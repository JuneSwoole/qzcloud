<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Models\Request;

/**
 * 云主机 添加防火墙端口
 *
 * @author juneChen <juneswoole@163.com>
 */
class AddPortRequest extends Request implements HttpRequestInterface
{
    // 云主机标识
    protected $vm_name;
    // 云主机内网端口
    protected $dport;
    //映射服务器公网端口
    protected $sport;
    // 主机 vps 公网ip
    protected $dip;

    public function __construct(array $data = [])
    {
        $this->fromMap($data);
    }
}
