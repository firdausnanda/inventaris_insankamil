@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3">Produk</h3>

                        {{-- Get Data dari Ecommerce --}}
                        <button class="btn btn-primary mb-3 btn-refresh">Refresh Data</button>

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
        });
    </script>
@endsection
