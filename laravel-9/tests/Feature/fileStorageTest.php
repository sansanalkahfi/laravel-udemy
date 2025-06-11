<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class fileStorageTest extends TestCase
{
    public function testStorage(){
        $filesistem = Storage::disk('local'); //memilih disk lokal
        $filesistem->put('test.txt', 'Hello, World!'); //menyimpan file test.txt dengan konten 'Hello, World!'
        self::assertEquals(
            'Hello, World!',
            $filesistem->get('test.txt') //mengambil konten dari file test.txt
        );

    }
    public function testPublicStorage(){
        $filesistem = Storage::disk('public'); //memilih disk Publik
        $filesistem->put('testpublik.txt', 'Hello, World!'); //menyimpan file testpublik.txt dengan konten 'Hello, World!'
        self::assertEquals(
            'Hello, World!',
            $filesistem->get('testpublik.txt') //mengambil konten dari file testpublik.txt
        );

    }
}
