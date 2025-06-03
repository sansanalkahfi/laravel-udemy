<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $req): string
    {
        $name = $req->input('nama', 'Tanpa Nama');
        return "Halo, $name";
    }

    public function hellofirst(Request $req): string
    {
        $firstname = $req->input('nama.first', 'Tanpa Nama');
        $lastname = $req->input('nama.last', 'Tanpa Nama');
        return "Halo, $firstname $lastname";
    }

    public function helloInput(Request $req): string
    {
        $input = $req->input();
        return
            json_encode($input, JSON_PRETTY_PRINT);
    }

    public function helloArray(Request $req): string
    {
        $input = $req->input("produk.*.name");
        return json_encode($input, JSON_PRETTY_PRINT);
    }
}
