<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fileUploadController extends Controller
{
   public function testUpload(Request $req): string 
   {
    $reqPicture = $req->file('picture'); //mengambil file yang diupload
    $reqPicture->storePubliclyAs('picture', $reqPicture->getClientOriginalName(), 'public'); 
    return "Sukses:" . $reqPicture->getClientOriginalName();
   }
}
