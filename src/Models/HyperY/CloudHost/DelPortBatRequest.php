<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Models\Request;

class DelPortBatRequest extends Request implements HttpRequestInterface
{
    // 云主机 标识
    protected $vm_name;
    // 云主机内网端口,多个用,分隔
    protected $dport;
    //映射服务器公网端口,多个用,分隔
    protected $sport;
    // 主机 vps 公网ip
    protected $dip;
    // 端口类型 tcp udp
    protected $type_;

    public function __construct(array $data = [])
    {
        $this->fromMap($data);
    }
}
