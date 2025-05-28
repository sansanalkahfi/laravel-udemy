<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{
   public function testHello()
   {
       $response = $this->get('/controller/hello/Abdul');
       $response->assertSeeText('Halo Abdul');
   }

   public function testRequest()
   {
       $response = $this->get('/controller/hello/request', ["Accept" => "plain/text"]);
       $response->assertSeeText('controller/hello/request');
       $response->assertSeeText('http://localhost/controller/hello/request');
       $response->assertSeeText('GET');
       $response->assertSeeText('plain/text');
   }
}
