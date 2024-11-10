<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{
    public function showDashboard(Request $request)
    {
        // Mendapatkan semua produk dengan filter keberangkatan jika ada
        $products = Product::getFilteredProducts($request->input('departure_location'));

        // Menampilkan view dashboard dan mengirim data produk
        return view('dashboard', compact('products'));
    }
}
