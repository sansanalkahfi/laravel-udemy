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


    public function inputType(Request $req): string
    {
        $name = $req->input('name');
        $maried = $req->boolean('maried', false);
        $birthDate = $req->date('birth_date', 'Y-m-d');

        return json_encode([
            'name' => $name,
            'maried' => $maried,
            'birth_date' => $birthDate,
        ]);
    }

    //Filter Request Input
    public function filterOnly(Request $req): string
    {
        $name = $req->only(['name.first', 'name.last']);
        return json_encode($name);
    }

    public function filterExcept(Request $req): string
    {
        $user = $req->except(['admin']);
        return json_encode($user);
    }

}
