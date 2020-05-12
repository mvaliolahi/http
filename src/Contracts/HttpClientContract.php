<?php


namespace Mvaliolahi\Http\Contracts;


/**
 * Interface HttpClientContract
 * @package Mvaliolahi\Http\Contracts
 */
interface HttpClientContract
{
    /**
     * @param $url
     * @param $parameters
     * @param array $headers
     * @param array $options
     * @return mixed
     */
    public function get($url, $parameters = null, $headers = [], $options = []);

    /**
     * @param $uri
     * @param $parameters
     * @param array $headers
     * @param array $options
     * @return mixed
     */
    public function post($uri, $parameters, $headers = [], $options = []);

    /**
     * @param $uri
     * @param $parameters
     * @param array $headers
     * @param array $options
     * @return mixed
     */
    public function put($uri, $parameters, $headers = [], $options = []);

    /**
     * @param $url
     * @param $parameters
     * @param array $headers
     * @param array $options
     * @return mixed
     */
    public function patch($url, $parameters, $headers = [], $options = []);

    /**
     * @param $uri
     * @param $parameters
     * @param array $headers
     * @param array $options
     * @return mixed
     */
    public function delete($uri, $parameters, $headers = [], $options = []);

    /**
     * @return mixed
     */
    public function errors();

    /**
     * @return mixed
     */
    public function code();

    /**
     * Get or set current client object
     *
     * @return void
     */
    public function client($client = null);
}