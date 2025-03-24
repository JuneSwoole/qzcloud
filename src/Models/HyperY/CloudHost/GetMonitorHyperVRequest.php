<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Models\Request;

class GetMonitorHyperVRequest extends Request implements HttpRequestInterface
{

    // 云主机标识
    protected $vm_name;

    public function __construct(array $data = [])
    {
        $this->fromMap($data);
    }
}
