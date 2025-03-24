<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Models\Body;

/**
 * 虚拟主机运行状态
 *
 * @author juneChen <juneswoole@163.com>
 */
class GetVmStateBody extends Body
{

    /**
     * 运行状态
     *
     * @var string
     */
    public $state = '';
}
