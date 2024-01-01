<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        return view('frontend.master');
    }

    public function home(){
        $product = Product::where('status', '1')->get();
        $highlighted_product = Product::where('highlighted', '1')->get();

        $title = "Home";

        return view('frontend.home', compact('product', 'highlighted_product', 'title'));
    }
}
