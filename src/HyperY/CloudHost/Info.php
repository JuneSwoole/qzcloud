<?php

declare(strict_types=1);

namespace QZCloudApi\HyperY\CloudHost;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Kernel\ProviderBase;
use QZCloudApi\Models\HyperY\CloudHost\GetThumbnailImageHyperVBody;
use QZCloudApi\Models\HyperY\CloudHost\GetVmGuidHyperVBody;
use QZCloudApi\Models\HyperY\CloudHost\GetVmStateBody;
use QZCloudApi\Models\HyperY\CloudHost\GetMonitorHyperVBody;
use QZCloudApi\Models\Response;

/**
 * 云主机信息
 *
 * @author juneChen <juneswoole@163.com>
 */
class Info extends ProviderBase
{
    /**
     * 获取云主机状态
     *
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function vmState(HttpRequestInterface $HttpRequest = null): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/GetVmState', $HttpRequest);
        return Response::fromMap($response, new GetVmStateBody());
    }

    /**
     * 获取云主机监控
     *
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function monitorHyperV(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/MonitorHyperV', $HttpRequest);
        return Response::fromMap($response, new GetMonitorHyperVBody());
    }

    /**
     * 获取云主机运行图片
     *
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function thumbnailImageHyperV(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/GetThumbnailImageHyperV', $HttpRequest);
        return Response::fromMap($response, new GetThumbnailImageHyperVBody());
    }

    /**
     * 获取云主机GUID
     *
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function vmGuidHyperV(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/GetVmGuidHyperV', $HttpRequest);
        return Response::fromMap($response, new GetVmGuidHyperVBody());
    }
}
