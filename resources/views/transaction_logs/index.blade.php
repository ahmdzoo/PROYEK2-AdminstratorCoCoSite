<x-adminheader />
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Riwayat Transaksi</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>Nama Pelanggan</th>
                                        <th>Layanan</th>
                                        <th>Produk</th>
                                        <th>Tagihan</th>
                                        <th>Nomor WA</th>
                                        <th>Alamat</th>
                                        <th>Status Pesanan</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp
                                    @foreach($transactionLogs as $log)
                                        @php    $i++; @endphp
                                        <tr>
                                            <td>{{ $log->customer_name }}</td>
                                            <td>{{ $log->service }}</td>
                                            <td>{{ $log->product }}</td>
                                            <td>{{ floatval($log->bill) }}</td>
                                            <td>{{ $log->whatsapp_number }}</td>
                                            <td>{{ $log->address }}</td>
                                            <td class="font-weight-medium">
                                                <div class="badge badge-info">{{ $log->order_status }}</div>
                                            </td>
                                            <td class="font-weight-medium">
                                                <!-- Button to Open the Modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#UpdateData{{ $i }}">
                                                    Update
                                                </button>
                                                <!-- The Modal -->
                                                <div class="modal" id="UpdateData{{ $i }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Update Data Transaksi</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <form action="{{ route('transaction_logs.update') }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $log->id }}">
                                                                    <div class="form-group">
                                                                        <label for="customer_name">Nama Pelanggan</label>
                                                                        <input type="text" name="customer_name"
                                                                            value="{{ $log->customer_name }}"
                                                                            placeholder="Masukkan Nama Pelanggan"
                                                                            class="form-control mb-2">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="service">Layanan</label>
                                                                        <input type="text" name="service"
                                                                            value="{{ $log->service }}"
                                                                            placeholder="Masukkan Layanan"
                                                                            class="form-control mb-2">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="product">Produk</label>
                                                                        <input type="text" name="product"
                                                                            value="{{ $log->product }}"
                                                                            placeholder="Masukkan Produk"
                                                                            class="form-control mb-2">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="bill">Tagihan</label>
                                                                        <input type="number" name="bill"
                                                                            value="{{ $log->bill }}"
                                                                            placeholder="Masukkan Tagihan"
                                                                            class="form-control mb-2">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="whatsapp_number">Nomor WA</label>
                                                                        <input type="text" name="whatsapp_number"
                                                                            value="{{ $log->whatsapp_number }}"
                                                                            placeholder="Masukkan Nomor WA"
                                                                            class="form-control mb-2">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Alamat</label>
                                                                        <input type="text" name="address"
                                                                            value="{{ $log->address }}"
                                                                            placeholder="Masukkan Alamat"
                                                                            class="form-control mb-2">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="order_status">Status Pesanan</label>
                                                                        <select name="order_status" class="form-control">
                                                                            <option value="{{ $log->order_status }}">
                                                                                {{ $log->order_status }}
                                                                            </option>
                                                                            <option value="Pending">Pending</option>
                                                                            <option value="Completed">Completed</option>
                                                                            <option value="Cancelled">Cancelled</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="action">Action</label>
                                                                        <input type="text" name="action"
                                                                            value="{{ $log->action }}"
                                                                            placeholder="Masukkan Action"
                                                                            class="form-control mb-2">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-success">Simpan
                                                                        Perubahan</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <a href="{{ URL::to('deleteTransaction/' . $log->id)}}"
                                                    class="btn btn-danger">Delete</a>
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
</div>