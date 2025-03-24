<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Models\Body;

/**
 * 云主机GUID
 *
 * @author juneChen <juneswoole@163.com>
 */
class GetVmGuidHyperVBody extends Body
{

    /**
     * 唯一GUID
     *
     * @var string
     */
    public $guid = '';
}
