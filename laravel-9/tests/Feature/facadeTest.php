<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Mockery;
use Tests\TestCase;

class facadeTest extends TestCase
{

    public function testconfig()
    {
        //--Menggunakan Dependency
        $initConfig = $this->app->make('config'); //Inisiasi Object config
        $DependencyFirstname = $initConfig->get('testConfig.contoh.author.firstname'); //Mengambil data config : testConfig.contoh.author.firstname
        //--

        //--Menggunakan Facade
        $facadesFirstname = Config::get('testConfig.contoh.author.firstname'); //langsung mengambil data config tanpa harus inisiasi object config
        //--


        var_dump(Config::get('testConfig.contoh')); //VAR DUMP untuk menampilkan isi config 

        self::assertEquals($facadesFirstname, $DependencyFirstname); // Test apakah hasilnya sama



    }

    public function testMockingconfig() {
        //--Menggunakan Facade
        Config::shouldReceive('get')
            ->with('testConfig.contoh.author.firstname')
            ->andReturn('bukan Sansan');
        $facadesFirstname = Config::get('testConfig.contoh.author.firstname'); //langsung mengambil data config tanpa harus inisiasi object config
        //--
        self::assertEquals($facadesFirstname, 'bukan Sansan'); // Test apakah hasilnya sama
    }
}
