<?php

declare(strict_types=1);

namespace QZCloudApi\HyperY\CloudHost;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Kernel\ProviderBase;
use QZCloudApi\Models\HyperY\CloudHost\AddPortBody;
use QZCloudApi\Models\HyperY\CloudHost\AddDomainBody;
use QZCloudApi\Models\HyperY\CloudHost\DelDomainBatBody;
use QZCloudApi\Models\HyperY\CloudHost\DelPortBody;
use QZCloudApi\Models\HyperY\CloudHost\DelDomainBody;
use QZCloudApi\Models\HyperY\CloudHost\DelPortBatBody;
use QZCloudApi\Models\Response;

class Forward extends ProviderBase
{
    /**
     * 添加端口
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function addPort(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/addPort', $HttpRequest);
        return Response::fromMap($response, new AddPortBody());
    }

    /**
     * 删除端口
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function removePort(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/delPort', $HttpRequest);
        return Response::fromMap($response, new DelPortBody());
    }

    /**
     * 批量删除端口
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function batDeletePortHost(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/delPortBat', $HttpRequest);
        return Response::fromMap($response, new DelPortBatBody());
    }

    /**
     * 添加域名白名单
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function addDomain(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/Forward/AddDomain', $HttpRequest);
        return Response::fromMap($response, new AddDomainBody());
    }

    /**
     * 删除域名白名单
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function removeDomain(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/Forward/DelDomain', $HttpRequest);
        return Response::fromMap($response, new DelDomainBody());
    }


    /**
     * 批量删除域名
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function batDeleteDomainHost(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/Forward/DelDomainBat', $HttpRequest);
        return Response::fromMap($response, new DelDomainBatBody());
    }
}
