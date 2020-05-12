<?php

namespace Tests\Feature;

use Mvaliolahi\Http\Curl;
use Tests\TestCase;

class CurlTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_work()
    {
        $client = new Curl();

        $client->get('https://www.google.com');

        $this->assertEquals(200, $client->code());
    }
}
