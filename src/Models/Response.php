<?php

declare(strict_types=1);

namespace QZCloudApi\Models;

use Psr\Http\Message\ResponseInterface;

class Response
{

    /**
     * @example 错误码
     *
     * @var integer 
     */
    public $code = 200;

    /**
     * @example 错误说明
     *
     * @var string 
     */
    public $msg = '';

    /**
     * @example 返回数据
     *
     * @var Body|null
     */
    public $data;

    public function toMap(): array
    {
        $map = [];
        foreach (get_object_vars($this) as $key => $value) {
            if ($key == 'data' && $value instanceof Body)
                $value = $value->toMap();
            $map[$key] =  $value;
        }
        return $map;
    }

    /**
     * @param array $map
     * @param Query|array $query
     * @param boolean $find
     * @return Response
     * @author juneChen <juneswoole@163.com>
     */
    public static function fromMap(ResponseInterface $response, Body $Body): self
    {
        $model = new self();
        $model->code = $response->getStatusCode();
        $model->msg = $response->getReasonPhrase();
        $body = $response->getBody()->getContents();
        if (!empty($body)) {
            $result = json_decode($body, true);
            if (is_string($result)) {
                $model->msg = $result;
            }
            if (!empty($result['Message'])) {
                $model->msg = $result['Message'];
            }
            if (!empty($result['code'])) {
                $model->code = $result['code'];
            }
            if (!empty($result['msg'])) {
                $model->msg = $result['msg'];
            }
            if (isset($result['data'])) {
                $model->data = $Body->fromMap($result['data']);
            }
        }
        return $model;
    }

    public function toArray(): array
    {
        $map = [];
        foreach (get_object_vars($this) as $key => $value) {
            if ($key == 'data' && $value instanceof Body)
                $value = $value->toArray();
            $map[$key] = $value;
        }
        return $map;
    }
}
