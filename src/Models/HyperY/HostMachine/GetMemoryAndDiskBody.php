<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\HostMachine;

use QZCloudApi\Models\Body;

/**
 * 宿主机内存和硬盘信息
 *
 * @author juneChen <juneswoole@163.com>
 */
class GetMemoryAndDiskBody extends Body
{

    /**
     * 硬盘信息列表
     * [
     *  "name" => "硬盘名称",
     *  "size" => "容量",
     *  "freeSpace" => "剩余空间"
     * ]
     *
     * @var array
     */
    public $space = [];

    /**
     * 总内存
     *
     * @var float
     */
    public $memory = 0;

    /**
     * 剩余内存
     *
     * @var float
     */
    public $freeMemory = 0;
}
