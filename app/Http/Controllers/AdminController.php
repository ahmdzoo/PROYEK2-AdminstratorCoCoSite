<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan halaman dashboard
    public function index()
    {
        return view('dashboard.index');
    }

    // Menampilkan halaman produk
    public function products()
    {
        $products = Products::all();
        return view('Dashboard.products', compact('products'));
    }

    // Menampilkan form tambah produk
    public function showAddProductForm()
    {
        return view('Dashboard.add-product');
    }

    // Menambahkan produk baru
    public function addNewProduct(Request $data)
    {
        $validatedData = $data->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
            'keterangan' => 'required|string',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarPath = $data->file('file')->store('uploads/products', 'public');

        $product = new Products();
        $product->Nama = $validatedData['nama'];
        $product->Gambar = $gambarPath;
        $product->Harga = $validatedData['harga'];
        $product->Deskripsi = $validatedData['deskripsi'];
        $product->Jumlah = $validatedData['jumlah'];
        $product->Keterangan = $validatedData['keterangan'];
        $product->save();

        return redirect()->back()->with('success', 'Selamat! Data Berhasil Ditambahkan');
    }

    // Menghapus produk
    public function deleteProduct($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }

    // Mengupdate produk
    public function updateProduct(Request $data)
    {
        $validatedData = $data->validate([
            'id' => 'required|integer',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
            'keterangan' => 'required|string',
            'file' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Products::findOrFail($validatedData['id']);

        if ($data->hasFile('file')) {
            $gambarPath = $data->file('file')->store('uploads/products', 'public');
            $product->Gambar = $gambarPath;
        }

        $product->Nama = $validatedData['nama'];
        $product->Harga = $validatedData['harga'];
        $product->Deskripsi = $validatedData['deskripsi'];
        $product->Jumlah = $validatedData['jumlah'];
        $product->Keterangan = $validatedData['keterangan'];
        $product->save();

        return redirect()->back()->with('success', 'Produk berhasil diperbarui');
    }
}
