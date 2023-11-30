<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\tes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  Product::all();
        return view('pages.product.product', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.product.addProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->image) {
            //Proses Membahkan File Image Secara Lokal
            $fileName = $request->product_name . '.jpg';
            $request->file('image')->storeAs('public/images', $fileName);

            Product::create([
                'nama_barang' => $request->product_name,
                'stok' => $request->stock,
                'harga' => $request->price,
                'gambar' => $fileName
            ]);
        } else {
            Product::create([
                'nama_barang' => $request->product_name,
                'stok' => $request->stock,
                'harga' => $request->price,
            ]);
        }

        return redirect()->route('product.index')->with('message', 'Add Product Success');
    }

    /**
     * Display the specified resource.
     */
    public function show($product)
    {
        $product = Product::find($product);

        return view('pages.product.editProduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $product)
    {
        $product = Product::find($product);

        if ($request->image) {
            //Proses Membahkan File Image Secara Lokal
            $fileName = $request->product_name . '.jpg';
            $request->file('image')->storeAs('public/images', $fileName);

            $product->update([
                'nama_barang' => $request->product_name,
                'stok' => $request->stock,
                'harga' => $request->price,
                'gambar' => $fileName
            ]);
        } else {
            $product->update([
                'nama_barang' => $request->product_name,
                'stok' => $request->stock,
                'harga' => $request->price,
            ]);
        }

        return redirect()->route('product.index')->with('message', 'Edit Product Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product)
    {
        $product = Product::find($product);
        Storage::delete('public/images/' . basename($product->gambar));
        $product->delete();
        return redirect()->route('product.index')->with('message', 'Delete Product Success');
    }
}
