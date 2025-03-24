<?php

declare(strict_types=1);

namespace QZCloudApi\Kernel;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use QZCloudApi\Exceptions\HttpClientExceptions;
use QZCloudApi\Exceptions\HttpClientRequestExceptions;
use QZCloudApi\Interfaces\HttpRequestInterface;

class HttpClient
{
    /**
     * Http客户端
     *
     * @var \GuzzleHttp\Client
     */
    private $client;

    public function __construct(Config $config)
    {
        try {
            $this->client = new Client($config->toMap());
        } catch (GuzzleException $e) {
            throw new HttpClientExceptions('Failed to initialize HTTP client: ' . $e->getMessage());
        }
    }

    public function get(string $uri, ?HttpRequestInterface $HttpRequest = null): ResponseInterface
    {
        return $this->request('GET', $uri, $HttpRequest);
    }

    public function post(string $uri, ?HttpRequestInterface $HttpRequest = null): ResponseInterface
    {
        return $this->request('POST', $uri, $HttpRequest);
    }

    public function put(string $uri, ?HttpRequestInterface $HttpRequest = null): ResponseInterface
    {
        return $this->request('PUT', $uri, $HttpRequest);
    }

    public function delete(string $uri, ?HttpRequestInterface $HttpRequest = null): ResponseInterface
    {
        return $this->request('DELETE', $uri, $HttpRequest);
    }

    /**
     * 发起请求
     *
     * @param string $method 请求类型
     * @param string $uri 请求地址
     * @param HttpRequestInterface|null $HttpRequest 请求参数
     * @return \Psr\Http\Message\ResponseInterface 
     * @author juneChen <juneswoole@163.com>
     */
    public function request(string $method, string $uri, ?HttpRequestInterface $HttpRequest = null): ResponseInterface
    {
        try {
            $options = [];
            if (!is_null($HttpRequest)) {
                $options['json'] = $HttpRequest->toMap();
            }
            return $this->client->request($method, $uri, $options);
        } catch (GuzzleException $e) {
            throw new HttpClientRequestExceptions("$method request failed: " . $e->getMessage());
        }
    }

    /**
     * 获取客户端
     *
     * @return GuzzleHttp\Client
     * @author juneChen <juneswoole@163.com>
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}
