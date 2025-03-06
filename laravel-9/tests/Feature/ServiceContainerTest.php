<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class ServiceContainerTest extends TestCase
{
    public Function testDependencyInjection()
    {
        //$foo = new Foo();
        $vFoo = $this->app->make(Foo::class); //sama dengan new Foo()
        $vfoo2 = $this->app->make(Foo::class); //sama dengan New Foo (object berbeda dengan $vFoo)

        self::assertEquals('Foo', $vFoo->fxFoo());
        self::assertEquals('Foo', $vfoo2->fxFoo());
        self::assertNotSame($vFoo, $vfoo2);
        




    }
}
