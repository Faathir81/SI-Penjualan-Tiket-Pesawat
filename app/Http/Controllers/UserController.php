<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{
    public function welcomeDashboard()
    {
        $products = Product::all(); // Ambil data yang sama seperti dashboard
        return view('welcome', compact('products'));
    }

    public function showDashboard(Request $request)
    {
        // Ambil filter dari request
        $departureLocation = $request->input('departure_location');
        $arrivalLocation = $request->input('arrival_location');

        // Dapatkan produk yang sesuai dengan filter
        $products = Product::getFilteredProducts($departureLocation, $arrivalLocation);

        // Tampilkan view dashboard dengan data produk
        return view('dashboard', compact('products'));
    }
}
