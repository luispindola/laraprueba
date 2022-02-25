<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Principal extends Controller
{
    public function inicio()
    {
        return view('principal.inicio');
    }
}
