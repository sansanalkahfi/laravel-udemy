<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseTest extends TestCase
{
    public function testResponse()
    {
        $response = $this->get('/response/hello');

        $response->assertStatus(200);
        $response->assertSeeText("Hello Response");
    }
}
