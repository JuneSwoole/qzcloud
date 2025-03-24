<?php

declare(strict_types=1);

namespace Tests\HyperY;

use PHPUnit\Framework\TestCase;
use QZCloudApi\Client;
use QZCloudApi\Kernel\Config;
use QZCloudApi\Models\HyperY\HostMachine\GetISOListRequest;

/**
 * 宿主机信息测试
 *
 * @author juneChen <juneswoole@163.com>
 */
class HostMachineInfoText extends TestCase
{
    private $baseUri = 'http://192.168.200.42:8000';
    private $apiKey = '1234567890';

    /**
     * 测试宿主机状态信息
     * php vendor\phpunit\phpunit\phpunit --filter companyInfo Tests/HyperY/HostMachineInfoText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function companyInfo(): void
    {
        $Config = new Config([
            'baseUri' =>  $this->baseUri,
            'apiKey'  => $this->apiKey,
        ]);
        $result = Client::hyperY($Config)->hostMachineInfo->companyInfo();
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试宿主机内存和硬盘信息
     * php vendor\phpunit\phpunit\phpunit --filter memoryAndDisk Tests/HyperY/HostMachineInfoText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function memoryAndDisk(): void
    {
        $Config = new Config([
            'baseUri' =>  $this->baseUri,
            'apiKey'  => $this->apiKey,
        ]);
        $result = Client::hyperY($Config)->hostMachineInfo->memoryAndDisk();
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试宿主机下虚拟机的网络监控信息
     * php vendor\phpunit\phpunit\phpunit --filter networkMonitoring Tests/HyperY/HostMachineInfoText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function networkMonitoring(): void
    {
        $Config = new Config([
            'baseUri' =>  $this->baseUri,
            'apiKey'  => $this->apiKey,
        ]);
        $result = Client::hyperY($Config)->hostMachineInfo->networkMonitoring();
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试宿主机 IOS文件列表
     * php vendor\phpunit\phpunit\phpunit --filter getISOList Tests/HyperY/HostMachineInfoText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function getISOList(): void
    {
        $request = new GetISOListRequest([
            'iso_dir' => 'E:\vhd_bak', // ISO 文件目录
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->hostMachineInfo->getISOList($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试宿主机 获取流量信息
     * php vendor\phpunit\phpunit\phpunit --filter getVMFlow Tests/HyperY/HostMachineInfoText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function getVMFlow(): void
    {
        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->hostMachineInfo->getVMFlow();
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }
}
