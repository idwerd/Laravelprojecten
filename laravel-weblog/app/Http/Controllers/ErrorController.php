<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function unauthorized() 
    {   
        return view('errors.401');
    }

    public function forbidden() 
    {   
        return view('errors.403');
    }
}
