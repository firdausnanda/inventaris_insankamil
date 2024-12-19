@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <!--  Owl carousel -->
        <div class="owl-carousel counter-carousel owl-theme">
            <div class="item">
                <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                    <div class="card-header">
                        <h4 class="card-title text-start">Stok Tersedia</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <p class="fw-semibold fs-3 text-primary mb-1">Totak Produk</p>
                        </div>
                        <h5 class="fw-semibold text-primary mb-0">{{ $stok_tersedia }}</h5>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-danger-subtle shadow-none">
                    <div class="card-header">
                        <h4 class="card-title text-start">Stok Habis</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <p class="fw-semibold fs-3 text-danger mb-1">Totak Produk</p>
                        </div>
                        <h5 class="fw-semibold text-danger mb-0">{{ $stok_habis }}</h5>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
                    <div class="card-header">
                        <h4 class="card-title text-start">Stok Segera Habis</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <p class="fw-semibold fs-3 text-warning mb-1">Totak Produk</p>
                        </div>
                        <h5 class="fw-semibold text-warning mb-0">{{ $stok_segera_habis }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                            <div class="mb-3 mb-sm-0">
                                <h4 class="card-title fw-semibold">Daftar Produk</h4>
                                <p class="card-subtitle">Daftar Produk Terbaru</p>
                            </div>
                            <div>
                                {{-- <select class="form-select">
                                    <option value="1">March 2024</option>
                                    <option value="2">April 2024</option>
                                    <option value="3">May 2024</option>
                                    <option value="4">June 2024</option>
                                </select> --}}
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle text-nowrap mb-0" id="table-product">
                                <thead>
                                    <tr class="text-muted fw-semibold">
                                        <th scope="col" class="ps-0">Nama Produk</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Harga</th>
                                    </tr>
                                </thead>
                                <tbody class="border-top">
                                    @forelse ($data as $item)
                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <h6 class="fw-semibold mb-1">{{ $item->nama_produk }}</h6>
                                                        <p class="fs-2 mb-0 text-muted">
                                                            {{ $item->kategori_id }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 fs-3">{{ $item->stok_id }}</p>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge fw-semibold py-1 w-85 bg-primary-subtle text-primary">Low</span>
                                            </td>
                                            <td>
                                                <p class="fs-3 text-dark mb-0">Rp.
                                                    {{-- {{ number_format($item->harga_produk, 0, ',', '.') }}</p> --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // $('#table-product').DataTable({
            //     responsive: true,
            // });
        });
    </script>
@endsection
