## Http Client

[![Latest Stable Version](https://poser.pugx.org/mvaliolahi/http/v/stable)](https://packagist.org/packages/mvaliolahi/http)
[![Total Downloads](https://poser.pugx.org/mvaliolahi/http/downloads)](https://packagist.org/packages/mvaliolahi/http)
[![Build Status](https://travis-ci.org/mvaliolahi/http.svg?branch=master)](https://travis-ci.org/mvaliolahi/http)
[![PHP-Eye](https://php-eye.com/badge/mvaliolahi/http/tested.svg?style=flat)](https://php-eye.com/package/mvaliolahi/http)
[![PHPStan](https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat)](https://github.com/phpstan/phpstan) 
<!-- [![StyleCI](https://github.styleci.io/repos/165880013/shield?style=flat)](https://github.styleci.io/repos/165880013) -->
<!-- [![codecov](https://codecov.io/gh/mvaliolahi/http/branch/master/graph/badge.svg)](https://codecov.io/gh/mvaliolahi/http) --> 

Http Client / Contract

#### Install

```bash
composer require mvaliolahi/http
```

#### 1. Instantiate Client

```php
    $client =  new \Mvaliolahi\Http\Curl();
```

#### 2. Available methods:

```php
    public function get($url, $parameters = null, $headers = [], $options = []);
    public function post($uri, $parameters, $headers = [], $options = []);
    public function put($uri, $parameters, $headers = [], $options = []);
    public function patch($url, $parameters, $headers = [], $options = []);
    public function delete($uri, $parameters, $headers = [], $options = []);
    
    public function errors();
    public function code();
    public function client($client = null);
    public function disableSSL($flag)
    public function originalResponse()
```    


#### 3. Implements new client

Just impelemet the `Mvaliolahi\Http\Contracts\HttpClientContract` interface and done!