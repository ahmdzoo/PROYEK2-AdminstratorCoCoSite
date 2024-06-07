<!-- resources/views/Dashboard/add-product.blade.php -->
<x-adminheader />
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Tambah Produk</p>
                        <form action="{{ URL::to('AddNewProduct') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" placeholder="Masukkan Nama Produk" class="form-control mb-2"
                                id="nama">
                            <label for="file">Gambar</label>
                            <input type="file" name="file" class="form-control mb-2" id="file">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" placeholder="Masukkan Deskripsi Produk"
                                class="form-control mb-2" id="deskripsi">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" placeholder="Masukkan Harga Produk"
                                class="form-control mb-2" id="harga">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" placeholder="Masukkan Jumlah Produk"
                                class="form-control mb-2" id="jumlah">
                            <label for="keterangan">Keterangan</label>
                            <select name="keterangan" class="form-control" id="keterangan">
                                <option value="">Pilih Keterangan</option>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Habis">Habis</option>
                            </select>
                            <input type="submit" name="save" class="btn btn-success" value="Simpan Data" id="save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-adminfooter />