<?php

namespace Tests\Feature;
use App\Data\Bar;
use App\Data\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DependencyInjectionTest extends TestCase
{
    public function testDependencyInjection()
    {
        $vFoo = new Foo();
        $vBar = new Bar($vFoo);
        self::assertEquals('Foo and Bar', $vBar->bar());

    }

}
