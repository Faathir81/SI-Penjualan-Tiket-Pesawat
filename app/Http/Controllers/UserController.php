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

        if ($departureLocation || $arrivalLocation) {
            return redirect()->route('tickets', [
                'departure_location' => $departureLocation,
                'arrival_location' => $arrivalLocation,
            ]);
        }
        $products = Product::getFilteredProducts($departureLocation, $arrivalLocation);

        return view('dashboard', compact('products'));
    }

    public function showTickets(Request $request)
    {
        $departureLocation = $request->get('departure_location');
        $arrivalLocation = $request->get('arrival_location');

        $products = Product::query()
            ->when($departureLocation, function ($query, $departureLocation) {
                $query->where('departure_location', 'LIKE', "%$departureLocation%");
            })
            ->when($arrivalLocation, function ($query, $arrivalLocation) {
                $query->where('arrival_location', 'LIKE', "%$arrivalLocation%");
            })
            ->get();

        return view('tickets', compact('products'));
    }
}
