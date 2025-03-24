<?php

declare(strict_types=1);

namespace QZCloudApi\HyperY\CloudHost;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Kernel\ProviderBase;
use QZCloudApi\Models\HyperY\CloudHost\AddAclExtendedHyperVBody;
use QZCloudApi\Models\HyperY\CloudHost\RemoveAclExtendedHyperVBody;
use QZCloudApi\Models\Response;

class Firewall extends ProviderBase
{
    /**
     * 添加防火墙策略
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function addFirewall(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/AddAclExtendedHyperV', $HttpRequest);
        return Response::fromMap($response, new AddAclExtendedHyperVBody());
    }

    /**
     * 删除防火墙策略
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function removeFirewall(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/RemoveAclExtendedHyperV', $HttpRequest);
        return Response::fromMap($response, new RemoveAclExtendedHyperVBody());
    }
}
