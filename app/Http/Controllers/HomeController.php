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
        $departureLocation = $request->input('departure_location');
        $arrivalLocation = $request->input('arrival_location');

        if ($departureLocation || $arrivalLocation) {
            return redirect()->route('tickets', [
                'departure_location' => $departureLocation,
                'arrival_location' => $arrivalLocation,
            ]);
        }
        $products = Product::getFilteredProducts($departureLocation, $arrivalLocation);

        return view('welcome', compact('products'));
    }
}
