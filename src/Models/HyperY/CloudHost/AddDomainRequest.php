<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Models\Request;
use QZCloudApi\Interfaces\HttpRequestInterface;

/**
 * 云主机 添加域名白名单
 *
 * @author juneChen <juneswoole@163.com>
 */
class AddDomainRequest extends Request implements HttpRequestInterface
{
    // 云主机标识
    protected $vm_name;
    // 域名
    protected $domain;
    // IP地址
    protected $dip;

    public function __construct(array $data = [])
    {
        $this->fromMap($data);
    }
}
