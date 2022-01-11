<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorpageController extends Controller
{
    public function denied(){
        return view('backend.errorpage.denied');
    }
}
