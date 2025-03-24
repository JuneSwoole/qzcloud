<?php

declare(strict_types=1);

namespace QZCloudApi\Kernel;

class ModuleEntry
{
    /**
     * 类映射数组
     *
     * @var array
     */
    protected $providers = [];

    private $base;

    /**
     * 配置
     *
     * @var \QZCloudApi\Kernel\Config
     */
    protected $config;

    /**
     * HTTP 通信客户端
     *
     * @var \QZCloudApi\Kernel\HttpClient
     */
    protected $httpClient;

    // 注册提供者
    public function registerProvider(string $name, string $class)
    {
        $this->providers[$name] = $class;
    }

    private function getProvidersClass(string $name)
    {
        if (isset($this->providers[$name])) {
            $providers = new $this->providers[$name]();
            $providers->setClient($this->httpClient);
            return $providers;
        }
        throw new \InvalidArgumentException("Provider $name not found.");
    }

    public function __get($name)
    {
        $this->base = $this->getProvidersClass($name);
        return $this->base;
    }

    public function __call($method, $args)
    {
        if (!$this->base) {
            throw new \RuntimeException("No provider loaded.");
        }
        if (method_exists($this->base, $method)) {
            return $this->base->$method(...$args);
        }
        throw new \BadMethodCallException("Method $method does not exist.");
    }
}
