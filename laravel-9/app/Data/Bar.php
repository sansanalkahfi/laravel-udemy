<?php

namespace App\Data;

class Bar
{
    public Foo $foo; //Class Bar Depends-on (bergantung) pada Clas Foo, jadi class Bar bisa dibuat klo Class Foo sudah didefinisikan terlebih dahulu
    public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }
    public function bar(): string
    {
        return $this->foo->fxFoo() . ' and Bar';
    }
}
