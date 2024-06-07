<x-adminheader />
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Top Products</p>
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TambahData">
                            Tambah Data
                        </button>
                        <!-- The Modal -->
                        <div class="modal" id="TambahData">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Data Produk</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{ url('/AddNewProduct') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <label for="">Nama</label>
                                            <input type="text" name="nama" placeholder="Masukkan Nama Produk"
                                                class="form-control mb-2" id="">
                                            <label for="">Gambar</label>
                                            <input type="file" name="file" class="form-control mb-2" id="">
                                            <label for="">Deskripsi</label>
                                            <input type="text" name="deskripsi" placeholder="Masukkan Deskripsi Produk"
                                                class="form-control mb-2" id="">
                                            <label for="">Harga</label>
                                            <input type="number" name="harga" placeholder="Masukkan Harga Produk"
                                                class="form-control mb-2" id="">
                                            <label for="">Jumlah</label>
                                            <input type="number" name="jumlah" placeholder="Masukkan Jumlah Produk"
                                                class="form-control mb-2" id="">
                                            <label for="">Keterangan</label>
                                            <select name="keterangan" class="form-control" id="">
                                                <option value="">Pilih Keterangan</option>
                                                <option value="Tersedia">Tersedia</option>
                                                <option value="Habis">Habis</option>
                                            </select>
                                            <input type="submit" name="save" class="btn btn-success" value="Simpan Data"
                                                id="">
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Gambar</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
$i = 0;
                                    @endphp
                                    @foreach ($products as $item)
                                                                                                            @php
                                        $i++;
                                                                                                            @endphp
                                                                                                            <tr>
                                                                                                                <td>{{ $item->Nama }}</td>
                                                                                                                <td><img src="{{ asset('storage/' . $item->Gambar) }}" width="100px"></td>
                                                                                                                <td>{{ $item->Deskripsi }}</td>
                                                                                                                <td class="font-weight-bold">{{ $item->Harga }}</td>
                                                                                                                <td>{{ $item->Jumlah }}</td>
                                                                                                                <td class="font-weight-medium"> 
                                                                                                                    <div class="badge badge-info">{{ $item->keterangan }}</div>
                                                                                                                </td>
                                                                                                                <td class="font-weight-medium">
                                                                                                                    <!-- Button to Open the Modal -->
                                                                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UpdateData{{ $i }}">
                                                                                                                        Update
                                                                                                                    </button>
                                                                                                                    <!-- The Modal -->
                                                                                                                    <div class="modal" id="UpdateData{{ $i }}">
                                                                                                                        <div class="modal-dialog">
                                                                                                                            <div class="modal-content">
                                                                                                                                <!-- Modal Header -->
                                                                                                                                <div class="modal-header">
                                                                                                                                    <h4 class="modal-title">Update Data Produk</h4>
                                                                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                                                </div>
                                                                                                                                <!-- Modal body -->
                                                                                                                                <div class="modal-body">
                                                                                                                                    <form action="{{ url('/UpdateProduct') }}" method="POST" enctype="multipart/form-data">
                                                                                                                                        @csrf
                                                                                                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                                                                                                        <div class="form-group">
                                                                                                                                            <label for="nama">Nama</label>
                                                                                                                                            <input type="text" name="nama" value="{{ $item->Nama }}"
                                                                                                                                                placeholder="Masukkan Nama Produk" class="form-control mb-2">
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group">
                                                                                                                                            <label for="file">Gambar</label>
                                                                                                                                            <input type="file" name="file" class="form-control mb-2">
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group">
                                                                                                                                            <label for="deskripsi">Deskripsi</label>
                                                                                                                                            <input type="text" name="deskripsi" value="{{ $item->Deskripsi }}"
                                                                                                                                                placeholder="Masukkan Deskripsi Produk" class="form-control mb-2">
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group">
                                                                                                                                            <label for="harga">Harga</label>
                                                                                                                                            <input type="number" name="harga" value="{{ $item->Harga }}"
                                                                                                                                                placeholder="Masukkan Harga Produk" class="form-control mb-2">
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group">
                                                                                                                                            <label for="jumlah">Jumlah</label>
                                                                                                                                            <input type="number" name="jumlah" value="{{ $item->Jumlah }}"
                                                                                                                                                placeholder="Masukkan Jumlah Produk" class="form-control mb-2">
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group">
                                                                                                                                            <label for="keterangan">Keterangan</label>
                                                                                                                                            <select name="keterangan" class="form-control">
                                                                                                                                                <option value="{{ $item->keterangan }}">{{ $item->keterangan }}</option>
                                                                                                                                                <option value="Tersedia">Tersedia</option>
                                                                                                                                                <option value="Habis">Habis</option>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                                                                                                                    </form>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <a href="{{ URL::to('deleteProduct/' . $item->id)}}" class="btn btn-danger">Delete</a>
                                                                                                                </td>
                                                                                                            </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <x-adminfooter />