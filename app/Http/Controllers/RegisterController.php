<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        $title = "Sign Up";

        return view('frontend.register', compact('title'));
    }
}
