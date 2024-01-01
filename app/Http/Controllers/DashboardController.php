<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Users;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $title = 'Dashboard';
        $product = Product::orderBy('created_at', 'desc')->take(10)->get();

        $product_count = count(Product::all());
        $product_count_last = Product::orderBy('updated_at', 'desc')->first();

        $active_product_count = count(Product::where('status', '1')->get());
        $active_product_count_last = Product::where('status', '1')->orderBy('updated_at', 'desc')->first();

        $user_count = count(Users::all());
        $user_count_last = Users::orderBy('updated_at', 'desc')->first();

        $active_user_count = count(Users::where('active_status', '1')->get());
        $active_user_count_last = Users::where('active_status', '1')->orderBy('updated_at', 'desc')->first();

        if($active_user_count_last == null){
            $active_user_count_last = $user_count_last;
        };

        $count_data = [
            'product_count' => $product_count,
            'active_product_count' => $active_product_count,
            'user_count' => $user_count,
            'active_user_count' => $active_user_count,
        ];

        $last_updated_data = [
            'product' => $product_count_last->updated_at,
            'active_product' => $active_product_count_last->updated_at,
            'user' => $user_count_last->updated_at,
            'active_user' => $active_user_count_last->updated_at
        ];

        return view('backend.dashboard', compact('title', 'product', 'count_data', 'last_updated_data'));
    }
}
