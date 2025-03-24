<?php

declare(strict_types=1);

namespace QZCloudApi\HyperY\CloudHost;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Kernel\ProviderBase;
use QZCloudApi\Models\HyperY\CloudHost\AttachISOHyperVBody;
use QZCloudApi\Models\HyperY\CloudHost\CreateHyperVTaskBody;
use QZCloudApi\Models\HyperY\CloudHost\ResetNetworkBody;
use QZCloudApi\Models\HyperY\CloudHost\SetVmBootOrderHyperVBody;
use QZCloudApi\Models\Response;

/**
 * 云主机管理类
 *
 * @author juneChen <juneswoole@163.com>
 */
class Manage extends ProviderBase
{
    /**
     * 创建 云主机
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function createHost(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/CreateHyperVTask', $HttpRequest);
        return Response::fromMap($response, new CreateHyperVTaskBody());
    }

    /**
     * 更新 云主机
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function updateHost(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/CreateHyperVTask', $HttpRequest);
        return Response::fromMap($response, new CreateHyperVTaskBody());
    }

    /**
     * 删除 云主机
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function deleteHost(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/CreateHyperVTask', $HttpRequest);
        return Response::fromMap($response, new CreateHyperVTaskBody());
    }

    /**
     * 重装 云主机
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function reinstallHost(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/CreateHyperVTask', $HttpRequest);
        return Response::fromMap($response, new CreateHyperVTaskBody());
    }

    /**
     * 创建 快照
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function createSnapshot(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/CreateHyperVTask', $HttpRequest);
        return Response::fromMap($response, new CreateHyperVTaskBody());
    }

    /**
     * 恢复快照
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function restoreSnapshot(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/CreateHyperVTask', $HttpRequest);
        return Response::fromMap($response, new CreateHyperVTaskBody());
    }

    /**
     * 删除快照
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function removeSnapshot(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/CreateHyperVTask', $HttpRequest);
        return Response::fromMap($response, new CreateHyperVTaskBody());
    }

    /**
     * 创建备份
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function createBackup(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/CreateHyperVTask', $HttpRequest);
        return Response::fromMap($response, new CreateHyperVTaskBody());
    }

    /**
     * 恢复备份
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function restoreBackup(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/CreateHyperVTask', $HttpRequest);
        return Response::fromMap($response, new CreateHyperVTaskBody());
    }

    /**
     * 删除备份
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function removeBackup(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/CreateHyperVTask', $HttpRequest);
        return Response::fromMap($response, new CreateHyperVTaskBody());
    }

    /**
     * 设置启动顺序
     *
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function setVmBootOrder(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/SetVmBootOrderHyperV', $HttpRequest);
        return Response::fromMap($response, new SetVmBootOrderHyperVBody());
    }

    /**
     * 挂载或者卸载iso文件
     *
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function attachISO(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/AttachISOHyperV', $HttpRequest);
        return Response::fromMap($response, new AttachISOHyperVBody());
    }

    /**
     * 重置网络配置
     *
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function resetNetwork(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/ResetNetwork', $HttpRequest);
        return Response::fromMap($response, new ResetNetworkBody());
    }
}
