<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Models\Request;
use QZCloudApi\Interfaces\HttpRequestInterface;

/**
 * 云主机 添加防火墙策略
 *
 * @author juneChen <juneswoole@163.com>
 */
class AddAclExtendedHyperVRequest extends Request implements HttpRequestInterface
{

    // 云主机标识
    protected $vm_name = '';

    // 策略名称
    protected $name = '';

    //授权策略 1接受 2拒绝
    protected $action = 1;

    //规则方向，1 入，2 出
    protected $direction = 1;

    // IP地址 0.0.0.0为不限制
    protected $remoteIPAddress = '0.0.0.0';

    // 端口,端口填写:-1 为不限制
    protected $localPort = -1;

    // 协议类型:(全部)ANY,TCP，UDP,ICMP
    protected $protocol = 'ANY';

    // 优先级 1-1000 数字越小越优先
    protected $weight = 1;

    public function __construct(array $data = [])
    {
        $this->fromMap($data);
    }
}
