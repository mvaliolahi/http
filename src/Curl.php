<?php

namespace Mvaliolahi\Http;

use Curl\Curl as CurlClient;
use ErrorException;
use Mvaliolahi\Http\Contracts\HttpClientContract;

class Curl implements HttpClientContract
{
    /**
     * @var CurlClient
     */
    private $client;

    /**
     * @var null
     */
    private $errors = null;

    /**
     * Response code.
     * 
     * @var
     */
    private $code;

    /**
     * Disable SSL.
     *
     * @var boolean
     */
    private $disableSSL = false;


    /**
     * Get original client response.    
     *
     * @var mixed
     */
    private $originalResponse;


    public function __construct()
    {
        return $this->client = new CurlClient();
    }

    /**
     * @param $url
     * @param $parameters
     * @param array $headers
     * @param array $options
     * @return mixed
     * @throws ErrorException
     */
    public function get($url, $parameters = null, $headers = [], $options = [])
    {
        return $this->http('get', $url, $parameters, $headers, $options);
    }

    /**
     * @param $method
     * @param $url
     * @param $params
     * @param array $headers
     * @param array $options
     * @return array|null
     * @throws ErrorException
     */
    private function http($method, $url, $params = null, $headers = [], $options = [])
    {
        if (count($headers) == 0) {
            $headers = ['Content-Type' => 'application/json'];
        }

        $curl = $this->client();
        $curl->options($options);
        $curl->setHeaders($headers);

        if ($this->disableSSL) {
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
        }

        $curl->$method($url, $params);

        if ($curl->error) {
            $this->errors = [
                'code' => $curl->errorCode,
                'message' => $curl->errorMessage
            ];
        }

        $this->code = $curl->getHttpStatusCode();
        $this->originalResponse = $curl;

        return $curl->response;
    }

    /**
     * @return CurlClient
     * @throws ErrorException
     */
    public function client($client = null)
    {
        if (!is_null($client)) {
            return $this->client = $client;
        }

        return $this->client;
    }

    /**
     * @param $url
     * @param $parameters
     * @param array $headers
     * @param array $options
     * @return mixed
     * @throws ErrorException
     */
    public function post($url, $parameters, $headers = [], $options = [])
    {
        return $this->http('post', $url, $parameters, $headers, $options);
    }

    /**
     * @param $url
     * @param $parameters
     * @param array $headers
     * @param array $options
     * @return mixed
     * @throws ErrorException
     */
    public function put($url, $parameters, $headers = [], $options = [])
    {
        return $this->http('put', $url, $parameters, $headers, $options);
    }

    /**
     * @param $url
     * @param $parameters
     * @param array $headers
     * @param array $options
     * @return mixed
     * @throws ErrorException
     */
    public function patch($url, $parameters, $headers = [], $options = [])
    {
        return $this->http('patch', $url, $parameters, $headers, $options);
    }

    /**
     * @param $url
     * @param $parameters
     * @param array $headers
     * @param array $options
     * @return mixed
     * @throws ErrorException
     */
    public function delete($url, $parameters, $headers = [], $options = [])
    {
        return $this->http('delete', $url, $parameters, $headers, $options);
    }

    /**
     * @return mixed
     */
    public function errors()
    {
        return $this->errors;
    }

    /**
     * @inheritDoc
     */
    public function code()
    {
        return $this->code;
    }

    /**
     * Disable Or Enable SSL>
     *
     * @param boolean $flag
     * @return Curl
     */
    public function disableSSL($flag)
    {
        $this->disableSSL = $flag;

        return $this;
    }

    /**
     * Get Original Client Response.
     *
     * @return mixed
     */
    public function originalResponse()
    {
        return $this->originalResponse;
    }
}
