<?php

declare(strict_types=1);

namespace QZCloudApi\Models\HyperY\CloudHost;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Models\Request;

/**
 * 云主机 修改密码
 *
 * @author juneChen <juneswoole@163.com>
 */
class SetPasswordHyperVRequest extends Request implements HttpRequestInterface
{
    // 云主机标识
    protected $vm_name;
    // 密码
    protected $password;

    public function __construct(array $data = [])
    {
        $this->fromMap($data);
    }
}
