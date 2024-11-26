<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{
    public function welcomeDashboard()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    public function showDashboard(Request $request)
    {
        $departureLocation = $request->input('departure_location');
        $arrivalLocation = $request->input('arrival_location');

        $products = Product::getFilteredProducts($departureLocation, $arrivalLocation);

        return view('dashboard', compact('products'));
    }
}
