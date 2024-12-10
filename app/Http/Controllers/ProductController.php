<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk.
     */
    public function index()
    {
        $products = Product::where('id_user', Auth::id())->orderBy('id', 'desc')->get();
        $total = $products->count();

        return view('admin.product.home', compact('products', 'total'));
    }

    /**
     * Menampilkan halaman tambah produk.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function save(Request $request)
    {
        $validation = $request->validate([
            'airline' => 'required|string',
            'category' => 'required|in:class A,class B,class C',
            'departure_location' => 'required|string',
            'arrival_location' => 'required|string',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
            'price' => 'required|integer',
            'quota_tiket' => 'required|integer|max:25',
        ]);

        $validation['id_user'] = Auth::id();

        $data = Product::create($validation);

        if ($data) {
            session()->flash('success', 'Product added successfully.');
            return redirect(route('admin.products'));
        } else {
            session()->flash('error', 'An issue occurred while adding the product.');
            return redirect(route('admin.products.create'));
        }
    }

    /**
     * Menampilkan halaman edit produk.
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->where('id_user', Auth::id())->firstOrFail();
        return view('admin.product.update', compact('product'));
    }

    /**
     * Memperbarui data produk di database.
     */
    public function update(Request $request, $id)
    {
        // Cek apakah Auth::id() mengembalikan ID yang benar
        dd(Auth::id());
    
        $product = Product::where('id', $id)->where('id_user', Auth::id())->firstOrFail();
    
        $validation = $request->validate([
            'airline' => 'required|string',
            'category' => 'required|in:class A,class B,class C',
            'departure_location' => 'required|string',
            'arrival_location' => 'required|string',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
            'price' => 'required|integer',
            'quota_tiket' => 'required|integer|max:25',
        ]);
    
        // Konversi waktu ke format datetime MySQL
        $validation['departure_time'] = \Carbon\Carbon::parse($validation['departure_time'])->format('Y-m-d H:i:s');
        $validation['arrival_time'] = \Carbon\Carbon::parse($validation['arrival_time'])->format('Y-m-d H:i:s');
    
        $product->update($validation);
    
        session()->flash('success', 'Product updated successfully.');
        return redirect(route('admin.products'));
    }
    
    

    /**
     * Menghapus produk dari database.
     */
    public function delete($id)
    {
        $product = Product::where('id', $id)->where('id_user', Auth::id())->firstOrFail();

        if ($product->delete()) {
            session()->flash('success', 'Product deleted successfully.');
            return redirect(route('admin.products'));
        } else {
            session()->flash('error', 'Failed to delete product.');
            return redirect(route('admin.products'));
        }
    }
}
