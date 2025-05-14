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
    public function testView1()
    {
        $this->get('/hello-test')
            ->assertStatus(200) // Status code yang diharapkan (200 artinya oke)
            ->assertSee('Halo: abdul');
    }

    public function testRouteParameter()
    {
        $this->get('/products/23')
            ->assertStatus(200) // Status code yang diharapkan (200 artinya oke)
            ->assertSee('Product ID: 23');

        $this->get('/products/12/items/1')
            ->assertStatus(200) // Status code yang diharapkan (200 artinya oke)
            ->assertSee('Product ID: 12, Item Name: 1');
    }

    public function testNamedRoute()
    {
        $this->get('/produk/23')
            ->assertStatus(200) // Status code yang diharapkan (200 artinya oke)
            ->assertSee('Link: http://localhost/products/23');

            $this->get('/produk-redirect/23')
            //->assertStatus(200) // Status code yang diharapkan (200 artinya oke)
            ->assertRedirect('/products/23'); //URL tujuan redirect

    }
}
