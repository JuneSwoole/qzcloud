<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Models\Request;

class GetThumbnailImageHyperVRequest extends Request implements HttpRequestInterface
{

    // 云主机标识
    protected $vm_name;

    // 图片宽度（默认400）
    protected $width = 400;

    // 图片高度（默认300）
    protected $height = 300;

    public function __construct(array $data = [])
    {
        $this->fromMap($data);
    }
}
