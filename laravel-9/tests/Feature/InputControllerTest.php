<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testInputController()
    {
        // Test GET request with query parameter
        $this->get('/input/hello?nama=Sansan')
            ->assertSeeText('Halo, Sansan');

        // Test GET request with query parameter using form data / Body
        $this->post('/input/hello', ['nama' => 'Sansan'])
            ->assertSeeText('Halo, Sansan');
    }

    public function testInputNested()
    {
        $this->post('/input/hello/first', [
            'nama' => [
                'first' => 'Sansan',
                'last' => 'Al Kahfi'
            ]
        ])
            ->assertSeeText('Halo, Sansan Al Kahfi');
    }

    public function testInputAll()
    {
        $this->post('/input/hello/input', [
            'nama' => [
                'first' => 'Sansan',
                'last' => 'Al Kahfi'
            ]
        ])
            ->assertSeeText('nama')->assertSeeText('first')->assertSeeText('Sansan')->assertSeeText('last')->assertSeeText('Al Kahfi');
    }

    public function testInputArray()
    {
        $this->post(
            '/input/hello/array',
            [
                'produk' => [['name' => 'Apple Mac Book Pro'], ['name' => 'Samsung Galaxy S']]
            ]
        )
            ->assertSeeText('Apple Mac Book Pro')->assertSeeText('Samsung Galaxy S');
    }
}
