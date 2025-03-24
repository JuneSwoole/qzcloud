<?php

declare(strict_types=1);

namespace Tests\HyperY;

use PHPUnit\Framework\TestCase;
use QZCloudApi\Client;
use QZCloudApi\Kernel\Config;
use QZCloudApi\Models\HyperY\CloudHost\SetStateHyperVRequest;
use QZCloudApi\Models\HyperY\CloudHost\SetVmNicsStateHyperVRequest;
use QZCloudApi\Models\HyperY\CloudHost\SetPasswordHyperVRequest;
use QZCloudApi\Models\HyperY\CloudHost\SyncTimeHyperVRequest;
use QZCloudApi\Models\HyperY\CloudHost\ClearNetworkFlowHyperVRequest;
use QZCloudApi\Models\HyperY\CloudHost\UpdateOrAddIpHyperVBatRequest;

class CloudHostControlsTest extends TestCase
{
    private $baseUri = 'http://192.168.200.42:8000';
    private $apiKey = '1234567890';
    private $vm_name = 'test001';

    /**
     * 测试云主机 开机
     * @test
     * php vendor\phpunit\phpunit\phpunit --filter testStartHost Tests/HyperY/CloudHostControlsTest.php
     *
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function testStartHost(): void
    {
        $request = new SetStateHyperVRequest([
            'vm_name' => $this->vm_name,
            'state' => 2, // 开机状态
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostControls->startHost($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试云主机 关机
     * php vendor\phpunit\phpunit\phpunit --filter closeHost Tests/HyperY/CloudHostControlsTest.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function closeHost(): void
    {
        $request = new SetStateHyperVRequest([
            'vm_name' => $this->vm_name,
            'state' => 4, // 关机状态
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostControls->closeHost($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试云主机 断电
     * php vendor\phpunit\phpunit\phpunit --filter powerHost Tests/HyperY/CloudHostControlsTest.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function powerHost(): void
    {
        $request = new SetStateHyperVRequest([
            'vm_name' => $this->vm_name,
            'state' => 3, // 断电状态
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostControls->powerHost($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试云主机 重启
     * php vendor\phpunit\phpunit\phpunit --filter testRestartHost Tests/HyperY/CloudHostControlsTest.php
     *
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function testRestartHost(): void
    {
        $request = new SetStateHyperVRequest([
            'vm_name' => $this->vm_name,
            'state' => 11, // 重启状态
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostControls->restartHost($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试云主机 网络状态设置
     * php vendor\phpunit\phpunit\phpunit --filter setNetworkState Tests/HyperY/CloudHostControlsTest.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function setNetworkState(): void
    {
        $request = new SetVmNicsStateHyperVRequest([
            'vm_name' => $this->vm_name,
            'state' => 1, // 打开网络
            'vlanid' => '100',
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostControls->setNetworkState($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试云主机 修改密码
     * php vendor\phpunit\phpunit\phpunit --filter updatePasswordHost Tests/HyperY/CloudHostControlsTest.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function updatePasswordHost(): void
    {
        $request = new SetPasswordHyperVRequest([
            'vm_name' => $this->vm_name,
            'password' => 'newpassword123',
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostControls->updatePasswordHost($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试云主机 同步时间
     * php vendor\phpunit\phpunit\phpunit --filter syncTimeHost Tests/HyperY/CloudHostControlsTest.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function syncTimeHost(): void
    {
        $request = new SyncTimeHyperVRequest([
            'vm_name' => $this->vm_name,
            'state' => 1, // 同步时间
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostControls->syncTimeHost($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试云主机 清除流量
     * php vendor\phpunit\phpunit\phpunit --filter clearNetworkFlowHost Tests/HyperY/CloudHostControlsTest.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function clearNetworkFlowHost(): void
    {
        $request = new ClearNetworkFlowHyperVRequest([
            'vm_name' => $this->vm_name,
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostControls->clearNetworkFlowHost($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试云主机 批量设置ip
     * php vendor\phpunit\phpunit\phpunit --filter batSetip Tests/HyperY/CloudHostControlsTest.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function batSetip(): void
    {
        $request = new UpdateOrAddIpHyperVBatRequest([
            'vm_name' => $this->vm_name,
            'ip' => ['192.168.1.100'],
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostControls->batSetip($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }
}
