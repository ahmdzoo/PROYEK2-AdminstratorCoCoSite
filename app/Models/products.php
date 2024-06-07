<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['Nama', 'Gambar', 'Harga', 'Deskripsi', 'Jumlah', 'Keterangan'];

    // Jika tidak menggunakan timestamps, tambahkan ini
    public $timestamps = false;
}
