<?php

declare(strict_types=1);

namespace QZCloudApi\HyperY\HostMachine;

use QZCloudApi\Interfaces\HttpRequestInterface;
use QZCloudApi\Kernel\ProviderBase;
use QZCloudApi\Models\HyperY\CloudHost\GetVMFlowBody;
use QZCloudApi\Models\HyperY\HostMachine\GetCompanyInfoBody;
use QZCloudApi\Models\HyperY\HostMachine\GetISOListBody;
use QZCloudApi\Models\HyperY\HostMachine\GetMemoryAndDiskBody;
use QZCloudApi\Models\HyperY\HostMachine\GetNetworkMonitoringBody;
use QZCloudApi\Models\Response;

class Info extends ProviderBase
{
    /**
     * 获取宿主机状态信息
     * 包括：硬盘、CPU、内存
     *
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function companyInfo(): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/GetCompanyInfo');
        return Response::fromMap($response, new GetCompanyInfoBody());
    }

    /**
     * 获取宿主机硬盘和内存信息
     * 包括：硬盘、CPU、内存
     *
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function memoryAndDisk(): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/GetMemoryAndDisk');
        return Response::fromMap($response, new GetMemoryAndDiskBody());
    }

    /**
     * 获取宿主机所有虚拟机网络监控信息
     *
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function networkMonitoring(): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/GetNetworkMonitoring');
        return Response::fromMap($response, new GetNetworkMonitoringBody());
    }

    /**
     * 获取目录下的IOS文件列表
     *
     * @param HttpRequestInterface $HttpRequest
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function getISOList(HttpRequestInterface $HttpRequest): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/GetISOList', $HttpRequest);
        return Response::fromMap($response, new GetISOListBody());
    }

    /**
     * 获取云主机GUID
     *
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public function getVMFlow(): Response
    {
        $response = $this->getClient()->post('/api/qzcloud/GetVMFlow');
        return Response::fromMap($response, new GetVMFlowBody());
    }
}
