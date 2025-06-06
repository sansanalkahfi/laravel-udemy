<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestView extends TestCase
{
    public function testView1()
    {
        $this->get('hello-test')
            ->assertStatus(200) // Status code yang diharapkan (200 artinya oke)
            ->assertSee('hello: Abdul');
    }
    /**
     * @testFunction testTestViewTestViewWithoutRoute
     */
    public function testViewWithoutRoute()
    {
        $this->view('hello', ['nama' => 'abdul tanpa route'])
        ->assertSeeText('hello: abdul tanpa route');
    }
}
