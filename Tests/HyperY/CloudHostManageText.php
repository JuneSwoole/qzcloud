<?php

declare(strict_types=1);

namespace Tests\HyperY;

use PHPUnit\Framework\TestCase;
use QZCloudApi\Client;
use QZCloudApi\Kernel\Config;
use QZCloudApi\Models\HyperY\CloudHost\AttachISOHyperVRequest;
use QZCloudApi\Models\HyperY\CloudHost\CreateHyperVTaskRequest;
use QZCloudApi\Models\HyperY\CloudHost\ResetNetworkRequest;
use QZCloudApi\Models\HyperY\CloudHost\SetVmBootOrderHyperVRequest;

/**
 * 云主机管理测试
 *
 * @author juneChen <juneswoole@163.com>
 */
class CloudHostManageText extends TestCase
{

    private $baseUri = 'http://192.168.200.42:8000';
    private $apiKey = '1234567890';
    private $vm_name = 'test002';

    /**
     * 测试创建云主机
     * php vendor\phpunit\phpunit\phpunit --filter createHost Tests/HyperY/CloudHostManageText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function createHost(): void
    {
        $request = new CreateHyperVTaskRequest([
            "action" => 'create_vps',
            'data' => [
                'vm_name' => $this->vm_name,
                'name' => 'Test VM',
                'password' => 'password123',
                'template_path' => '/path/to/template',
                'vhd_path' => '/path/to/vhd',
                'vcpus' => 2,
                'cpu_limit' => 100,
                'os_type' => 'Windows',
                'max_memory_mb' => 4096,
                'min_memory_mb' => 2048,
                'os_name' => 'windows.vhdx',
                'os_min_iops' => 100,
                'os_max_iops' => 200,
                'max_iops' => 500,
                'min_iops' => 300,
                'data_size' => 100,
                'network' => [
                    ['ip' => '192.168.1.2', 'gateway' => '192.168.1.1', 'netmask' => '255.255.255.0'],
                ],
                'otherip' => ['192.168.1.3'],
                'vir_extensions' => true,
                'maximum_screen' => 1920,
                'ram_size' => 8,
                'node_name' => 'node1',
                'mscluster_name' => 'cluster1',
            ]
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostManage->createHost($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试更新云主机
     * php vendor\phpunit\phpunit\phpunit --filter updateHost Tests/HyperY/CloudHostManageText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function updateHost(): void
    {
        $request = new CreateHyperVTaskRequest([
            "action" => 'update_vps',
            'data' => [
                'vm_name' => $this->vm_name,
                'vcpus' => 4,
                'cpu_limit' => 100,
                'max_memory_mb' => 8192,
                'min_memory_mb' => 4096,
                'max_iops' => 1000,
                'min_iops' => 500,
                'data_size' => 200,
                'data_path' => '/path/to/data',
                'band_width' => 100,
                'inlimit' => 50,
                'os_min_iops' => 200,
                'os_max_iops' => 400,
                'vir_extensions' => false,
                'otherip' => ['192.168.1.4'],
                'maximum_screen' => 1080,
                'ram_size' => 16,
            ]
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostManage->updateHost($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试删除云主机
     * php vendor\phpunit\phpunit\phpunit --filter deleteHost Tests/HyperY/CloudHostManageText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function deleteHost(): void
    {
        $request = new CreateHyperVTaskRequest([
            "action" => 'remove_vps',
            'data' => [
                'vm_name' => $this->vm_name,
                'back_dir' => '/path/to/backup',
                'move' => 1,
            ]
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostManage->deleteHost($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试重装云主机
     * php vendor\phpunit\phpunit\phpunit --filter reinstallHost Tests/HyperY/CloudHostManageText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function reinstallHost(): void
    {
        $request = new CreateHyperVTaskRequest([
            'action' => 'reinstall',
            'data' => [
                'vm_name' => $this->vm_name,
                'name' => 'Test VM',
                'password' => 'password123',
                'template_path' => '/path/to/template',
                'vhd_path' => '/path/to/vhd',
                'os_type' => 'Windows',
                'network' => [
                    ['ip' => '192.168.1.2', 'gateway' => '192.168.1.1', 'netmask' => '255.255.255.0'],
                ],
                'os_name' => 'windows.vhdx',
            ]
        ]);
        $Config = new Config([
            'baseUri' =>  $this->baseUri,
            'apiKey'  => $this->apiKey,
        ]);
        $result = Client::hyperY($Config)->cloudHostManage->reinstallHost($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试创建快照
     * php vendor\phpunit\phpunit\phpunit --filter createSnapshot Tests/HyperY/CloudHostManageText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function createSnapshot(): void
    {
        $request = new CreateHyperVTaskRequest([
            "action" => 'create_snapshot',
            'data' => [
                'vm_name' => $this->vm_name,
                'name' => 'snapshot1',
            ]
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostManage->createSnapshot($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试还原快照
     * php vendor\phpunit\phpunit\phpunit --filter restoreSnapshot Tests/HyperY/CloudHostManageText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function restoreSnapshot(): void
    {
        $request = new CreateHyperVTaskRequest([
            "action" => 'restore_snapshot',
            'data' => [
                'vm_name' => $this->vm_name,
                'name' => 'snapshot1',
            ]
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostManage->restoreSnapshot($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试删除快照
     * php vendor\phpunit\phpunit\phpunit --filter removeSnapshot Tests/HyperY/CloudHostManageText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function removeSnapshot(): void
    {
        $request = new CreateHyperVTaskRequest([
            "action" => 'remove_snapshot',
            'data' => [
                'vm_name' => $this->vm_name,
                'name' => 'snapshot1',
            ]
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostManage->removeSnapshot($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试创建备份
     * php vendor\phpunit\phpunit\phpunit --filter createBackup Tests/HyperY/CloudHostManageText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function createBackup(): void
    {
        $request = new CreateHyperVTaskRequest([
            "action" => 'create_backup',
            'data' => [
                'vm_name' => $this->vm_name,
                'name' => 'backup1',
            ]
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostManage->createBackup($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试还原备份
     * php vendor\phpunit\phpunit\phpunit --filter restoreBackup Tests/HyperY/CloudHostManageText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function restoreBackup(): void
    {
        $request = new CreateHyperVTaskRequest([
            "action" => 'restore_backup',
            'data' => [
                'vm_name' => $this->vm_name,
                'name' => 'backup1',
            ]
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostManage->restoreBackup($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试删除快照
     * php vendor\phpunit\phpunit\phpunit --filter removeBackup Tests/HyperY/CloudHostManageText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function removeBackup(): void
    {
        $request = new CreateHyperVTaskRequest([
            "action" => 'remove_backup',
            'data' => [
                'vm_name' => $this->vm_name,
                'name' => 'backup1',
            ]
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostManage->removeBackup($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 设置启动顺序
     * php vendor\phpunit\phpunit\phpunit --filter setVmBootOrder Tests/HyperY/CloudHostManageText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function setVmBootOrder(): void
    {
        $request = new SetVmBootOrderHyperVRequest([
            'vm_name' => $this->vm_name,
            'first' => 'IDE',
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostManage->setVmBootOrder($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 挂载或者卸载iso文件
     * php vendor\phpunit\phpunit\phpunit --filter attachISO Tests/HyperY/CloudHostManageText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function attachISO(): void
    {
        $request = new AttachISOHyperVRequest([
            'vm_name' => $this->vm_name,
            'iso_path' => '/path/to/iso',
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostManage->attachISO($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 挂载或者卸载iso文件
     * php vendor\phpunit\phpunit\phpunit --filter resetNetwork Tests/HyperY/CloudHostManageText.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function resetNetwork(): void
    {
        $request = new ResetNetworkRequest([
            'vm_name' => $this->vm_name,
            'network' => [
                ['ip' => '192.168.1.2', 'gateway' => '192.168.1.1', 'netmask' => '255.255.255.0'],
            ],
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostControls->resetNetwork($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }
}
