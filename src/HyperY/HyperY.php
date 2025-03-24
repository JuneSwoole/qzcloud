<?php

declare(strict_types=1);

namespace QZCloudApi\HyperY;

use QZCloudApi\Kernel\Config;
use QZCloudApi\Kernel\HttpClient;
use QZCloudApi\Kernel\ModuleEntry;

class HyperY extends ModuleEntry
{
    /**
     * 类映射数组
     *
     * @var array
     */
    protected $providers = [
        // 宿主机信息
        'hostMachineInfo' => HostMachine\Info::class,

        // 云主机信息
        'cloudHostInfo' => CloudHost\Info::class,
        //云主机管理
        'cloudHostManage' => CloudHost\Manage::class,
        //云主机控制
        'cloudHostControls' => CloudHost\Controls::class,
        //云主机防火墙
        'cloudHostFirewall' => CloudHost\Firewall::class,
        //云主机端口映射
        'cloudHostForward' => CloudHost\Forward::class,
    ];

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->httpClient = new HttpClient($config);
    }
}
