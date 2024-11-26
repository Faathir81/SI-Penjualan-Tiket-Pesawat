<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function welcome(Request $request)
    {
        $departure = $request->input('departure_location');
        $arrival = $request->input('arrival_location');

        $products = Product::query();

        if ($departure) {
            $products->where('departure_location', 'like', '%' . $departure . '%');
        }

        if ($arrival) {
            $products->where('arrival_location', 'like', '%' . $arrival . '%');
        }

        $products = $products->get();


        return view('welcome', compact('products'));
    }
}
