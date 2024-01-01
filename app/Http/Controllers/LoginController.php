<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){

        $status = $request->query('status');
        $title = "Login";

        return view('frontend.login', compact('status', 'title'));
    }
}
