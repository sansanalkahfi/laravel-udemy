<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestView extends TestCase
{
    public function testView1()
    {
        $response = $this->get('hello-test');
        $response->assertSeeText('Hello: Abdul');
        $this->get('hello-test')
            ->assertSeeText('Hello: Abdul');
    }
}
