<?php

declare(strict_types=1);

namespace Tests\HyperY;

use PHPUnit\Framework\TestCase;
use QZCloudApi\Client;
use QZCloudApi\Kernel\Config;
use QZCloudApi\Models\HyperY\CloudHost\GetMonitorHyperVRequest;
use QZCloudApi\Models\HyperY\CloudHost\GetThumbnailImageHyperVRequest;
use QZCloudApi\Models\HyperY\CloudHost\GetVmGuidHyperVRequest;
use QZCloudApi\Models\HyperY\CloudHost\GetVmStateRequest;

/**
 * 云主机信息测试
 *
 * @author juneChen <juneswoole@163.com>
 */
class CloudHostInfoText extends TestCase
{

    private $baseUri = 'http://192.168.200.42:8000';
    private $apiKey = '1234567890';
    private $vm_name = 'test001';

    /**
     * 测试获取云主机状态
     * php vendor\phpunit\phpunit\phpunit --filter vmState Tests/HyperY/CloudHostInfoText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function vmState(): void
    {
        $request = new GetVmStateRequest([
            'vm_name' => $this->vm_name
        ]);
        $Config = new Config([
            'baseUri' =>  $this->baseUri,
            'apiKey'  => $this->apiKey,
        ]);
        $result = Client::hyperY($Config)->cloudHostInfo->vmState($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试获取云主机监控
     * php vendor\phpunit\phpunit\phpunit --filter monitorHyperV Tests/HyperY/CloudHostInfoText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function monitorHyperV(): void
    {
        $request = new GetMonitorHyperVRequest([
            'vm_name' => $this->vm_name
        ]);
        $Config = new Config([
            'baseUri' =>  $this->baseUri,
            'apiKey'  => $this->apiKey,
        ]);
        $result = Client::hyperY($Config)->cloudHostInfo->monitorHyperV($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试获取云主机运行图片
     * php vendor\phpunit\phpunit\phpunit --filter thumbnailImageHyperV Tests/HyperY/CloudHostInfoText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function thumbnailImageHyperV(): void
    {
        $request = new GetThumbnailImageHyperVRequest([
            'vm_name' => $this->vm_name
        ]);
        $Config = new Config([
            'baseUri' =>  $this->baseUri,
            'apiKey'  => $this->apiKey,
        ]);
        $result = Client::hyperY($Config)->cloudHostInfo->thumbnailImageHyperV($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试获取云主机GUID
     * php vendor\phpunit\phpunit\phpunit --filter vmGuidHyperV Tests/HyperY/CloudHostInfoText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function vmGuidHyperV(): void
    {
        $request = new GetVmGuidHyperVRequest([
            'vm_name' => $this->vm_name
        ]);
        $Config = new Config([
            'baseUri' =>  $this->baseUri,
            'apiKey'  => $this->apiKey,
        ]);
        $result = Client::hyperY($Config)->cloudHostInfo->vmGuidHyperV($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }
}
