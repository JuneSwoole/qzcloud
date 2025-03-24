<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Models\Request;
use QZCloudApi\Interfaces\HttpRequestInterface;

/**
 * 创建 云主机任务
 *
 * @author juneChen <juneswoole@163.com>
 */
class CreateHyperVTaskRequest extends Request implements HttpRequestInterface
{

    // 操作类型 
    // create_vps（创建主机），update_vps（更新主机），remove_vps（删除主机），reinstall（重装系统）
    // create_snapshot （创建快照），restore_snapshot（还原快照），remove_snapshot（删除快照）
    // create_backup （创建备份），restore_backup（还原备份），remove_backup（删除备份）
    protected $action = '';

    // 回调参数 回调时会原样返回
    protected $callback_param;

    // 状态类型 (固定值) 
    protected $state = 1;

    /**
     * 云主机配置数据
     * @var array
     */
    protected $data = [
        // 云主机标识
        "vm_name" => "",
        // 名称
        "name" => "",
        // 密码
        "password" => "",
        // 系统模板路径
        "template_path" => "",
        // 数据盘放置路径
        "vhd_path" => "",
        // cpu核数
        "vcpus" => 0,
        // cpu最大使用率
        "cpu_limit" => 0,
        // 操作系统类型 'windows', 'centos', 'ubuntu', 'debian'
        "os_type" => '',
        // 最大内存，单位MB
        "max_memory_mb" => 0,
        // 最小内存，单位MB 不设置动态内存请不要填写，建议不要填写
        "min_memory_mb" => 0,
        //系统名字，后缀必须是 .vhdx
        "os_name" => "",
        // 系统最小iops，1个IOPS=8KB
        "os_min_iops" => 0,
        // 系统最大iops，1个IOPS=8KB
        "os_max_iops" => 0,
        // 数据盘大小，单位GB
        "data_size" => 0,
        // 数据盘最小iops，1个IOPS=8KB
        "min_iops" => 0,
        // 数据盘最大iops，1个IOPS=8KB
        "max_iops" => 0,
        // 是否支持虚拟化扩展，裸金属服务器 为 true
        "vir_extensions" => false,

        // 网卡配置
        'network' => [
            [
                'ip' => '', // 公网 IP
                'gateway' => '', // 网关
                'netmask' => '', // 子网掩码
                'dns1' => '', // DNS1
                'dns2' => '', // DNS2
                'band_width' => 0, // 带宽 MBps
                'mac' => '', // MAC 地址
                'switch_name' => '', // 交换机名称
                'vlanid' => '', // VLAN ID
                'inlimit' => 0, // 下行带宽限制 MBps
            ],
            [
                'ip' => '', // 私网 IP
                'gateway' => '', // 网关（私网通常为空）
                'netmask' => '', // 子网掩码
                'band_width' => 0, // 带宽 MBps（私网通常为 0）
                'mac' => '', // MAC 地址
                'switch_name' => '', // 交换机名称
                'vlanid' => '', // VLAN ID
            ],
        ],
        // 其他 IP
        "otherip" => "",
        // 操作系统盘放置路径（非必须）
        // "os_vhd_path" => "d",
        // 差异磁盘 0关闭，1开启（非必须）
        // "diff_disk" => 0,
        // 是否重新创建（非必须）
        // "re_create" => false,
        // 显卡最大分辨率（非必须）
        // 'maximum_screen' => null,
        // GPU 显存大小（非必须）
        // 'ram_size' => null,
        // 集群架构，节点名称（非必须）
        // 'node_name' => null,
        // 集群架构，集群名称（非必须）
        // 'mscluster_name' =>  null,
    ];

    public function __construct(array $data = [])
    {
        unset($data['state']);
        $data['data']   = array_merge($this->data, $data['data'] ?? []);
        $this->fromMap($data);
    }
}
