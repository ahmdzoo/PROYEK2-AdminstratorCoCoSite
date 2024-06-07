<?php
namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('Dashboard.index');
    }

    public function products()
    {
        $products = Products::all();
        return view('Dashboard.products', compact('products'));
    }
    public function deleteProduct($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Selamat! Data Berhasil Dihapus');
    }

    // Menampilkan form untuk menambahkan produk baru
    public function showAddProductForm()
    {
        return view('Dashboard.add-product');
    }

    // Menangani penambahan produk baru
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
    public function UpdateProduct(Request $data)
    {
        // Validasi data yang diterima
        $validatedData = $data->validate([
            'id' => 'required|integer|exists:products,id',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
            'keterangan' => 'required|string',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cari produk berdasarkan ID
        $product = Products::find($data->input('id'));

        // Update detail produk
        $product->Nama = $validatedData['nama'];
        $product->Harga = $validatedData['harga'];
        $product->Deskripsi = $validatedData['deskripsi'];
        $product->Jumlah = $validatedData['jumlah'];
        $product->Keterangan = $validatedData['keterangan'];

        // Menangani upload file jika ada file baru yang disediakan
        if ($data->hasFile('file')) {
            $gambarPath = $data->file('file')->store('uploads/products', 'public');
            $product->Gambar = $gambarPath;
        }

        // Simpan perubahan produk
        $product->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Selamat! Data Berhasil Diperbarui');
    }

}
