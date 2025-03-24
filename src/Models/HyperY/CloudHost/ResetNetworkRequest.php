<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Models\Request;

/**
 * 云主机 重置网络配置
 *
 * @author juneChen <juneswoole@163.com>
 */
class ResetNetworkRequest extends Request implements HttpRequestInterface
{
    // 云主机标识
    protected $vm_name;
    // 网卡配置
    protected $network = [
        // [
        //     'ip' => '', // 公网 IP
        //     'gateway' => '', // 网关
        //     'netmask' => '', // 子网掩码
        //     'dns1' => '', // DNS1
        //     'dns2' => '', // DNS2
        //     'band_width' => 0, // 带宽 MBps
        //     'mac' => '', // MAC 地址
        //     'switch_name' => '', // 交换机名称
        //     'vlanid' => '', // VLAN ID
        //     'inlimit' => 0, // 下行带宽限制 MBps
        // ],
        // [
        //     'ip' => '', // 私网 IP
        //     'gateway' => '', // 网关（私网通常为空）
        //     'netmask' => '', // 子网掩码
        //     'band_width' => 0, // 带宽 MBps（私网通常为 0）
        //     'mac' => '', // MAC 地址
        //     'switch_name' => '', // 交换机名称
        //     'vlanid' => '', // VLAN ID
        // ],
    ];

    public function __construct(array $data = [])
    {
        $this->fromMap($data);
    }
}
