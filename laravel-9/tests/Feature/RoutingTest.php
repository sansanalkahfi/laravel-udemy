<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testGet()
    {
        $this->get('/pzn') //Endpoint URL (Routing yang di test)
            ->assertStatus(200) //Status code yang diharapkan (200 artinya oke)
            ->assertSee('Halo siaaaap'); //Konten pada Endpoint URL
    }

    public function testRedirect()
    {
        $this->get('/ytb') //Endpoint URL (Routing yang di test)
            ->assertStatus(302) //Status code yang diharapkan (302 artinya redirect)
            ->assertRedirect('/pzn'); //URL tujuan redirect
    }

    public function testFallback()
    {
        $this->get('/urlteskagaada') //Endpoint URL (Routing yang di test)
            ->assertStatus(200) //Status code yang diharapkan (200 artinya oke)
            ->assertSee('404 halaman kaga ada'); //Konten pada Endpoint URL
    }
}
