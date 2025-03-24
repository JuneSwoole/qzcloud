<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Models\Request;

class DelDomainBatRequest extends Request implements HttpRequestInterface
{
    // 云主机标识
    protected $vm_name;
    // 域名，多个用,分隔
    protected $domain;

    public function __construct(array $data = [])
    {
        $this->fromMap($data);
    }
}
