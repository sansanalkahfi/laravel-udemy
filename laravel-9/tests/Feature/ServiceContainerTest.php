<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use App\Services\HelloServiceIndonesia;
use App\Services\HelloServices;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Assert;
use PhpParser\Builder\Function_;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertSame;

class ServiceContainerTest extends TestCase
{
    public function testDependencyInjection()
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
        $this->app->bind(Person::class, function ($app) {
            return new Person("text firstname", "text lastname");
        });


        $vPerson1 = $this->app->make(Person::class);
        $vPerson2 = $this->app->make(Person::class);

        self::assertEquals("text firstname", $vPerson1->firstname);
        self::assertEquals("text lastname", $vPerson2->lastname);
        self::assertNotSame($vPerson1, $vPerson2);
    }

    public function testSingleton()
    {

        $this->app->singleton(Person::class, function ($app) {
            return new Person("text firstname", "text lastname");
        });
        $vPerson1 = $this->app->make(Person::class);
        $vPerson2 = $this->app->make(Person::class);

        self::assertEquals("text firstname", $vPerson1->firstname);
        self::assertEquals("text lastname", $vPerson2->lastname);
        self::assertSame($vPerson1, $vPerson2);
    }

    public function testInstance()
    {
        $person = new Person("firstname", "lastname");

        $this->app->instance(Person::class, $person);

        $vPerson1 = $this->app->make(Person::class);
        $vPerson2 = $this->app->make(Person::class);

        self::assertEquals("firstname", $vPerson1->firstname);
        self::assertEquals("lastname", $vPerson2->lastname);
        self::assertSame($vPerson1, $vPerson2);
        self::assertSame($person, $vPerson2);
    }

    public function testDependencyInjectionSingleton() {
        $this->app->singleton(Foo::class, function($app){
            return new Foo();
        });
        $vFoo = $this->app->make(Foo::class);
        $vBar = $this->app->make(Bar::class);
        self::assertSame($vFoo, $vBar->foo);
    }

    public function testDependencyInjectionSingletonClosure() {
        
        $this->app->singleton(Foo::class, function($app){
            return new Foo();
        });
        $this->app->singleton(Bar::class, function($app){
            return new Bar($app->make(Foo::class));
        });
        $vFoo = $this->app->make(Foo::class);
        $vBar1 = $this->app->make(Bar::class);
        $vBar2 = $this->app->make(Bar::class);
        self::assertSame($vFoo, $vBar1->foo);
        self::assertSame($vBar1, $vBar2);
    }
    
    public function testInterfaceToClass()
    {
        $this->app->singleton(HelloServices::class, HelloServiceIndonesia::class);

        $helloService = $this->app->make(HelloServices::class);
        
        self::assertEquals("Halo Dunia", $helloService->Hello('Dunia'));
    }

}
