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
    public function welcome()
    {
        // Ambil semua produk dari database
        $products = Product::all();

        // Kirimkan data ke view
        return view('welcome', compact('products'));
    }
}
