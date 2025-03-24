<?php

declare(strict_types=1);

namespace Tests\HyperY;

use QZCloudApi\Client;
use QZCloudApi\Kernel\Config;
use PHPUnit\Framework\TestCase;
use QZCloudApi\Models\HyperY\CloudHost\AddPortRequest;
use QZCloudApi\Models\HyperY\CloudHost\DelPortRequest;
use QZCloudApi\Models\HyperY\CloudHost\AddDomainRequest;
use QZCloudApi\Models\HyperY\CloudHost\DelDomainBatRequest;
use QZCloudApi\Models\HyperY\CloudHost\DelDomainRequest;
use QZCloudApi\Models\HyperY\CloudHost\DelPortBatRequest;

class CloudHostForwardTest extends TestCase
{
    private $baseUri = 'http://192.168.200.42:8000';
    private $apiKey = '1234567890';
    private $vm_name = 'test001';

    /**
     * 测试云主机 添加端口映射
     * php vendor\phpunit\phpunit\phpunit --filter addPort Tests/HyperY/CloudHostForwardTest.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function addPort(): void
    {
        $request = new AddPortRequest([
            'dport' => '8080',
            'sport' => '80',
            'dip'   => '192.168.1.3',
            'vm_name' => $this->vm_name,
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostForward->addPort($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试云主机 删除端口映射
     * php vendor\phpunit\phpunit\phpunit --filter removePort Tests/HyperY/CloudHostForwardTest.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function removePort(): void
    {
        $request = new DelPortRequest([
            'dport' => '8080',
            'sport' => '80',
            'dip' => '192.168.1.2',
            'vm_name' => $this->vm_name,
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostForward->removePort($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试云主机 批量删除端口映射
     * php vendor\phpunit\phpunit\phpunit --filter batDeletePortHost Tests/HyperY/CloudHostForwardTest.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function batDeletePortHost(): void
    {

        $request = new DelPortBatRequest([
            'dport' => '8080',
            'sport' => '80',
            'dip' => '192.168.1.2',
            'type_' => 'tcp',
            'vm_name' => $this->vm_name,
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostForward->batDeletePortHost($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试云主机 添加域名白名单
     * php vendor\phpunit\phpunit\phpunit --filter addDomain Tests/HyperY/CloudHostForwardTest.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function addDomain(): void
    {
        $request = new AddDomainRequest([
            'domain' => 'xxx.com',
            'dip' => '192.168.1.2',
            'vm_name' => $this->vm_name,
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostForward->addDomain($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试云主机 删除域名白名单
     * php vendor\phpunit\phpunit\phpunit --filter removeDomain Tests/HyperY/CloudHostForwardTest.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function removeDomain(): void
    {
        $request = new DelDomainRequest([
            'domain' => 'xxx.com',
            'dip' => '192.168.1.2',
            'vm_name' => $this->vm_name,
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostForward->removeDomain($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }

    /**
     * 测试云主机 批量删除域名
     * php vendor\phpunit\phpunit\phpunit --filter batDeleteDomainHost Tests/HyperY/CloudHostForwardTest.php
     *
     * @test
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function batDeleteDomainHost(): void
    {

        $request = new DelDomainBatRequest([
            'domain' => [
                'xxx.com',
                'aaa.com',
            ],
            'vm_name' => $this->vm_name
        ]);

        $config = new Config([
            'baseUri' => $this->baseUri,
            'apiKey' => $this->apiKey,
        ]);

        $result = Client::hyperY($config)->cloudHostForward->batDeleteDomainHost($request);
        $this->assertEquals(200, $result->code, $result->msg);
        var_dump("\n" . json_encode($result->toMap(), JSON_UNESCAPED_UNICODE));
    }
}
