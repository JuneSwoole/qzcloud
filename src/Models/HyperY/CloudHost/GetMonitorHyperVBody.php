<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Models\Body;

/**
 * 云主机监控信息
 *
 * @author juneChen <juneswoole@163.com>
 */
class GetMonitorHyperVBody extends Body
{

    /**
     * 存储数据
     *
     * @var float
     */
    public $StorageStats = 0;

    /**
     * 网络统计
     * [
     *   'BytesSentPersec' => '发送字节数',
     *   'BytesReceivedPersec' => '接收字节数
     * ]
     *
     * @var array
     */
    public $NetworkStats = [];

    /**
     * CPU
     *
     * @var float
     */
    public $CpuStats = 0;

    /**
     * 内存
     *
     * @var float
     */
    public $MemoryStats = 0;

    /**
     * 流量
     * [
     *   'TrafficOut' => '出',
     *   'TrafficIn' => '入'
     * ]
     *
     * @var array
     */
    public $Traffic = [];
}
