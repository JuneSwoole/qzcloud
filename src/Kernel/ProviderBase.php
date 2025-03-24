<?php

declare(strict_types=1);

namespace QZCloudApi\Kernel;

class ProviderBase
{
    /**
     * 类映射数组
     *
     * @var HttpClient
     */
    private $client;

    /**
     * 注入HTTP请求客户端
     *
     * @param HttpClient $client
     * @return void
     * @author juneChen <juneswoole@163.com>
     */
    public function setClient(HttpClient $client): void
    {
        $this->client = $client;
    }

    /**
     * 获取HTTP请求客户端
     *
     * @return HttpClient
     * @author juneChen <juneswoole@163.com>
     */
    public function getClient(): HttpClient
    {
        return $this->client;
    }
}
