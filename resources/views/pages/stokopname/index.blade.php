@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3">Stok Opname</h3>

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

            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Terjadi kesalahan',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = document.referrer;
                }
            });

        });
    </script>
@endsection
