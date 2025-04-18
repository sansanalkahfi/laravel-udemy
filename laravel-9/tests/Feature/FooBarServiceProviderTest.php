<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FooBarServiceProviderTest extends TestCase
{
    public $a = 'amir';
    public $b = 'badru';
    public function testServiceProvider()
    {
        $vFoo1 = $this->app->make(Foo::class);
        $vFoo2 = $this->app->make(Foo::class);
        self::assertSame($vFoo1, $vFoo2);

        $vBar1 = $this->app->make(Bar::class);
        $vbar2 = $this->app->make(Bar::class);
        self::assertSame($vBar1, $vbar2);

        self::assertSame($vBar1->foo, $vFoo1);
    }

    public function testKosong()
    {
        $x = $this->a;
        $y = $this->b;
        self::assertNotSame($x, $y);
    }
}
