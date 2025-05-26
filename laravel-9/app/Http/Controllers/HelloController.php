<?php

namespace App\Http\Controllers;

use App\Services\HelloServices;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    private HelloServices $helloServices;
    public function __construct(HelloServices $helloServices)
    {
        $this->helloServices = $helloServices; // Inject HelloServices
    }

    public function hello(string $name): string
    {
        return $this->helloServices->hello($name);
    }
}
