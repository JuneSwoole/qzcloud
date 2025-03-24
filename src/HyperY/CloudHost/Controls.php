<?php

declare(strict_types=1);

namespace QZCloudApi\HyperY\CloudHost;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Kernel\ProviderBase;
use QZCloudApi\Models\HyperY\CloudHost\ClearNetworkFlowHyperVBody;
use QZCloudApi\Models\HyperY\CloudHost\SetPasswordHyperVBody;
use QZCloudApi\Models\HyperY\CloudHost\SetStateHyperVBody;
use QZCloudApi\Models\HyperY\CloudHost\SetVmNicsStateHyperVBody;
use QZCloudApi\Models\HyperY\CloudHost\SyncTimeHyperVBody;
use QZCloudApi\Models\HyperY\CloudHost\UpdateOrAddIpHyperVBatBody;
use QZCloudApi\Models\Response;

/**
 * 云主机控制类
 *
 * @author juneChen <juneswoole@163.com>
 */
class Controls extends ProviderBase
{
    /**
     * 开机
     *
     * @param HttpRequestInterface|null $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function startHost(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/SetStateHyperV', $HttpRequest);
        return Response::fromMap($response, new SetStateHyperVBody());
    }

    /**
     * 关机
     *
     * @param HttpRequestInterface|null $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function closeHost(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/SetStateHyperV', $HttpRequest);
        return Response::fromMap($response, new SetStateHyperVBody());
    }

    /**
     * 断电
     *
     * @param HttpRequestInterface|null $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function powerHost(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/SetStateHyperV', $HttpRequest);
        return Response::fromMap($response, new SetStateHyperVBody());
    }

    /**
     * 重启
     *
     * @param HttpRequestInterface|null $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function restartHost(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/SetStateHyperV', $HttpRequest);
        return Response::fromMap($response, new SetStateHyperVBody());
    }

    /**
     * 网络状态设置
     *
     * @param HttpRequestInterface|null $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function setNetworkState(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/SetVmNicsStateHyperV', $HttpRequest);
        return Response::fromMap($response, new SetVmNicsStateHyperVBody());
    }

    /**
     * 修改系统密码
     *
     * @param HttpRequestInterface|null $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function updatePasswordHost(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/SetPasswordHyperV', $HttpRequest);
        return Response::fromMap($response, new SetPasswordHyperVBody());
    }

    /**
     * 同步宿主机机时间
     *
     * @param HttpRequestInterface|null $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function syncTimeHost(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/SyncTimeHyperV', $HttpRequest);
        return Response::fromMap($response, new SyncTimeHyperVBody());
    }

    /**
     * 清除流量
     *
     * @param HttpRequestInterface|null $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function clearNetworkFlowHost(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/ClearNetworkFlowHyperV', $HttpRequest);
        return Response::fromMap($response, new ClearNetworkFlowHyperVBody());
    }

    /**
     * 批量设置ip
     *
     * @param HttpRequestInterface|null $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function batSetip(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/UpdateOrAddIpHyperVBat', $HttpRequest);
        return Response::fromMap($response, new UpdateOrAddIpHyperVBatBody());
    }
}
