<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResponseController extends Controller
{
    public function response( Request $req): Response
    {
        return "Hello Response";
    }
}
