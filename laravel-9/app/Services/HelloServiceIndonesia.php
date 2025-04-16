<?php
namespace App\Services;
class HelloServiceIndonesia implements HelloServices
{
    public function Hello(string $name): string
    {
        return "Halo {$name}";
    }
}


