<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class viewTest extends TestCase
{
    public function testView1()
    {
        $this->get('hello-test')
            ->assertStatus(200) // Status code yang diharapkan (200 artinya oke)
            ->assertSeeText('Halo: abdul');
    }

    public function testNestedView()
    {
        $this->get('/nested-test')
            ->assertStatus(200) // Status code yang diharapkan (200 artinya oke)
            ->assertSeeText('Halo Nested: sanusi');
    }

    public function testViewWithoutRoute()
    {
        $this->view('hello', ['nama' => 'abdul tanpa route'])
        ->assertSeeText('Halo: abdul tanpa route');
    }
}
