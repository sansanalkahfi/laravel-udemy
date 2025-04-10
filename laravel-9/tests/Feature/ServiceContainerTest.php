<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Assert;
use PhpParser\Builder\Function_;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class ServiceContainerTest extends TestCase
{
    public Function testDependencyInjection()
    {
        //$vFoo = new Foo();
        $vFoo = $this->app->make(Foo::class); //sama dengan new Foo()
        $vfoo2 = $this->app->make(Foo::class); //sama dengan New Foo (object berbeda dengan $vFoo)

        self::assertEquals('Foo', $vFoo->fxFoo());
        self::assertEquals('Foo', $vfoo2->fxFoo());
        self::assertNotSame($vFoo, $vfoo2);
    }

    public function testBind()
    {
        $this->app->bind(Person::class, function($app){
            return new Person("text firstname", "text lastname");
        });

        
        $vPerson1 = $this->app->make(Person::class);
        $vPerson2 = $this->app->make(Person::class);

        self::assertEquals("text firstname", $vPerson1->firstname);
        self::assertEquals("text lastname", $vPerson2->lastname);
        self::assertNotSame($vPerson1, $vPerson2);
        
    }

}
