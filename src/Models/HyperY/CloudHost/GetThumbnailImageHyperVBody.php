<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Models\Body;

/**
 * 云主机运行图片
 *
 * @author juneChen <juneswoole@163.com>
 */
class GetThumbnailImageHyperVBody extends Body
{

    /**
     * 图片 base64-encoded 数据
     *
     * @var string
     */
    public $pic = '';
}
