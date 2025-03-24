<?php

declare(strict_types=1);

namespace Tests\HyperY;

use PHPUnit\Framework\TestCase;
use QZCloudApi\Client;
use QZCloudApi\Kernel\Config;
use QZCloudApi\Models\HyperY\CloudHost\AddAclExtendedHyperVRequest;

/**
 * 云主机防火墙设置测试
 *
 * @author juneChen <juneswoole@163.com>
 */
class CloudHostFirewallTest extends TestCase
{
    private $baseUri = 'http://192.168.200.42:8000';
    private $apiKey = '1234567890';
    private $vm_name = 'test001';

    /**
     * 测试云主机 添加防火墙策略
     * php vendor\phpunit\phpunit\phpunit --filter addFirewall Tests/HyperY/CloudHostFirewallTest.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function addFirewall(): void
    {
        $request = new AddAclExtendedHyperVRequest([
            'vm_name' => $this->vm_name,
            'name' => 'firewall_rule1',
            'action' => '1',
            'direction' => '1',
            'remoteIPAddress' => '192.168.1.100',
            'localPort' => '8080',
            'protocol' => 'TCP',
            'weight' => 1,
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostFirewall->addFirewall($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试云主机 删除防火墙策略
     * php vendor\phpunit\phpunit\phpunit --filter removeFirewall Tests/HyperY/CloudHostFirewallTest.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function removeFirewall(): void
    {
        $request = new AddAclExtendedHyperVRequest([
            'vm_name' => $this->vm_name,
            'name' => 'firewall_rule1',
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostFirewall->removeFirewall($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }
}
