@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3">Produk</h3>

                        {{-- Get Data dari Ecommerce --}}
                        <div class="row">
                            <div class="col-12 mb-3 d-flex gap-2">
                                <button class="btn btn-primary d-flex align-items-center btn-refresh">
                                    <i class="ti ti-refresh me-1"></i>
                                    Refresh Data
                                </button>
                                <button class="btn btn-success d-flex align-items-center btn-produk-masuk">
                                    <i class="ti ti-box-multiple-plus me-1"></i>
                                    Produk Masuk
                                </button>
                                <button class="btn btn-danger d-flex align-items-center btn-produk-keluar">
                                    <i class="ti ti-box-multiple-minus me-1"></i>
                                    Produk Keluar
                                </button>
                            </div>
                        </div>

                        <table id="table-product" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#table-product').DataTable({
                responsive: true,
            });

            // Refresh Data
            $('.btn-refresh').on('click', function() {

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proses ini akan mengambil data dari ecommerce",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, perbarui!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: "GET",
                            dataType: 'json',
                            beforeSend: function() {
                                Swal.fire('Mohon Tunggu', 'Sedang memproses data...',
                                    'info');
                            },
                            success: function(response) {
                                Swal.fire('Error', 'Server Error',
                                    'error');
                            },
                            error: function(xhr, status, error) {
                                Swal.fire('error', 'Data gagal di refresh', 'error');
                            }
                        });
                    }
                });
            });

            // Produk Masuk
            $('.btn-produk-masuk').on('click', function() {
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        Swal.fire('Mohon Tunggu', 'Sedang memproses data...', 'info');
                    },
                    success: function(response) {
                        Swal.fire('Success', 'Data berhasil diambil', 'success');
                    },
                    error: function(xhr, status, error) {
                        Swal.fire('Error', 'Data gagal diambil', 'error');
                    }
                });
            });

            // Produk Keluar
            $('.btn-produk-keluar').on('click', function() {
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        Swal.fire('Mohon Tunggu', 'Sedang memproses data...', 'info');
                    },
                    success: function(response) {
                        Swal.fire('Success', 'Data berhasil diambil', 'success');
                    },
                    error: function(xhr, status, error) {
                        Swal.fire('Error', 'Data gagal diambil', 'error');
                    }
                });
            });
        });
    </script>
@endsection
