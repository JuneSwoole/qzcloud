<?php

declare(strict_types=1);

namespace QZCloudApi\Kernel;

class Config
{
    /**
     * 基础 URI，所有请求都会基于这个 URI
     *
     * @var string
     */
    private $baseUri = "";

    /**
     * 请求超时时间（单位：秒）
     *
     * @var int
     */
    private $timeout = 120;

    /**
     * 是否验证 SSL 证书
     *
     * @var bool
     */
    private $verify = true;

    /**
     * API 密钥
     *
     * @var string
     */
    private $apiKey = "";

    /**
     * 是否在 HTTP 状态码 4xx 或 5xx 时抛出异常
     *
     * @var bool
     */
    private $httpErrors = false;

    /**
     * HTTP 认证信息（用户名和密码）
     *
     * @var array
     */
    private $auth = [];

    /**
     * 代理服务器地址
     *
     * @var string
     */
    private $proxy = "";

    /**
     * 是否启用 Cookie 处理
     *
     * @var bool
     */
    private $cookies = false;

    /**
     * 是否允许重定向
     *
     * @var bool|array
     */
    private $allowRedirects = false;

    /**
     * 是否自动解码响应内容
     *
     * @var bool|string
     */
    private $decodeContent = true;

    /**
     * 连接超时时间（单位：秒）
     *
     * @var float
     */
    private $connectTimeout = 2.0;

    /**
     * 是否启用调试模式
     *
     * @var bool|resource
     */
    private $debug = false;

    /**
     * 是否以流的形式返回响应体
     *
     * @var bool
     */
    private $stream = false;

    /**
     * HTTP 请求头
     *
     * @var array
     */
    private $headers = [];

    /**
     * 请求统计回调（可用于日志或监控）
     *
     * @var callable|null
     */
    private $onStats = null;

    /**
     * 是否同步请求
     *
     * @var bool
     */
    private $synchronous = false;

    /**
     * 是否启用 IDN（国际化域名）转换
     *
     * @var bool
     */
    private $idnConversion = false;

    /**
     * HTTP 版本（默认 1.1）
     *
     * @var string
     */
    private $version = '1.1';

    /**
     * 构造函数
     *
     * @param array $config 配置数组
     */
    public function __construct(array $config = [])
    {
        foreach ($config as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    // ========== Getter 和 Setter ==========

    public function getBaseUri(): string
    {
        return trim($this->baseUri, '/');
    }
    public function setBaseUri(string $baseUri): void
    {
        $this->baseUri = $baseUri;
    }

    public function getTimeout(): int
    {
        return $this->timeout;
    }
    public function setTimeout(int $timeout): void
    {
        $this->timeout = $timeout;
    }

    public function getVerify(): bool
    {
        return $this->verify;
    }
    public function setVerify(bool $verify): void
    {
        $this->verify = $verify;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }
    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    public function getHttpErrors(): bool
    {
        return $this->httpErrors;
    }
    public function setHttpErrors(bool $httpErrors): void
    {
        $this->httpErrors = $httpErrors;
    }

    public function getAuth(): array
    {
        return $this->auth;
    }
    public function setAuth(array $auth): void
    {
        $this->auth = $auth;
    }

    public function getProxy(): string
    {
        return $this->proxy;
    }
    public function setProxy(string $proxy): void
    {
        $this->proxy = $proxy;
    }

    public function getCookies(): bool
    {
        return $this->cookies;
    }
    public function setCookies(bool $cookies): void
    {
        $this->cookies = $cookies;
    }

    public function getAllowRedirects()
    {
        return $this->allowRedirects;
    }
    public function setAllowRedirects($allowRedirects): void
    {
        $this->allowRedirects = $allowRedirects;
    }

    public function getDecodeContent()
    {
        return $this->decodeContent;
    }
    public function setDecodeContent($decodeContent): void
    {
        $this->decodeContent = $decodeContent;
    }

    public function getConnectTimeout(): float
    {
        return $this->connectTimeout;
    }
    public function setConnectTimeout(float $connectTimeout): void
    {
        $this->connectTimeout = $connectTimeout;
    }

    public function getDebug()
    {
        return $this->debug;
    }
    public function setDebug($debug): void
    {
        $this->debug = $debug;
    }

    public function getStream(): bool
    {
        return $this->stream;
    }
    public function setStream(bool $stream): void
    {
        $this->stream = $stream;
    }

    public function getHeaders(): array
    {
        if (empty($this->headers)) {
            $this->headers = [
                'Content-Type' => 'application/json',
                'apikey' => $this->getApiKey(),
            ];
        }
        return $this->headers;
    }
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function getOnStats()
    {
        return $this->onStats;
    }
    public function setOnStats($onStats): void
    {
        $this->onStats = $onStats;
    }

    public function getSynchronous(): bool
    {
        return $this->synchronous;
    }
    public function setSynchronous(bool $synchronous): void
    {
        $this->synchronous = $synchronous;
    }

    public function getIdnConversion(): bool
    {
        return $this->idnConversion;
    }
    public function setIdnConversion(bool $idnConversion): void
    {
        $this->idnConversion = $idnConversion;
    }

    public function getVersion(): string
    {
        return $this->version;
    }
    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    // ========== 转换成 Guzzle 可用数组 ==========

    public function toMap(): array
    {
        $map = [];
        foreach (get_object_vars($this) as $key => $value) {
            // 将驼峰式属性名转换为下划线式
            $underscoreKey = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key));

            // 如果属性是 baseUri 或 headers，调用对应的 getter 方法获取值
            if ($key === 'baseUri') {
                $value = $this->getBaseUri();
            } elseif ($key === 'headers') {
                $value = $this->getHeaders();
            }

            $map[$underscoreKey] = $value;
        }
        return $map;
    }
}
