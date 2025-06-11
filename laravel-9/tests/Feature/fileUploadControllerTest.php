<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class fileUploadControllerTest extends TestCase
{
    public function testUpload()
    {
        $gambar = UploadedFile::fake()->image("sansfake.png");

        $this->post('file/testupload', ['picture' => $gambar])
        
        ->assertSeeText("Sukses:sansfake.png");
    }
}
