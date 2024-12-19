@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3">User</h3>

                        {{-- Tambah Data --}}
                        <button class="btn btn-primary mb-3 btn-tambah">Tambah Data</button>

                        <table id="table-user" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formTambah">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" name="role" required>
                                <option value="admin">Admin</option>
                                <option value="superadmin">Superadmin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Update -->
    <div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="modalUpdateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUpdateLabel">Update User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formUpdate">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <input type="hidden" class="form-control" id="id" name="id" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="admin">Admin</option>
                                <option value="superadmin">Superadmin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            // Datatable
            let table = $('#table-user').DataTable({
                responsive: true,
                ajax: {
                    url: "{{ Auth::user()->hasRole('superadmin') ? route('superadmin.user.index') : route('admin.user.index') }}",
                    type: 'GET',
                },
                lengthChange: false,
                ordering: false,
                processing: true,
                columns: [{
                    targets: 0,
                    width: '10%',
                    className: 'align-middle text-center',
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }, {
                    targets: 1,
                    width: '20%',
                    className: 'align-middle text-center',
                    data: 'name',
                    render: function(data, type, row) {
                        return data;
                    }
                }, {
                    targets: 2,
                    width: '20%',
                    className: 'align-middle text-center',
                    data: 'email',
                    render: function(data, type, row) {
                        return data;
                    }
                }, {
                    targets: 3,
                    width: '20%',
                    className: 'align-middle text-center',
                    data: 'name',
                    render: function(data, type, row) {
                        return row.roles[0].name;
                    }
                }, {
                    targets: 4,
                    width: '20%',
                    className: 'align-middle text-center',
                    render: function(data, type, row) {
                        return `<button class="btn btn-primary btn-update">Edit</button> <button class="btn btn-danger btn-delete">Delete</button>`;
                    }
                }]
            });

            // Modal Tambah
            $('.btn-tambah').on('click', function() {
                $('#modalTambah').modal('show');
            });

            // Tambah
            $('#formTambah').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ Auth::user()->hasRole('superadmin') ? route('superadmin.user.store') : route('admin.user.store') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Mohon Tunggu',
                            html: 'Sedang memproses data...',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        });
                    },
                    success: function(response) {
                        Swal.close();
                        $('#modalTambah').modal('hide');
                        table.ajax.reload();
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    },
                    error: function(xhr) {
                        Swal.close();
                        let error = xhr.responseJSON;
                        Swal.fire({
                            title: 'Gagal!',
                            text: error.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });

            // Modal Update
            $('#table-user').on('click', 'button.btn-update', function() {

                let data = $('#table-user').DataTable().row($(this).parents('tr')).data();

                $('#modalUpdate #id').val(data.id);
                $('#modalUpdate #name').val(data.name);
                $('#modalUpdate #email').val(data.email);
                $('#modalUpdate #role').val(data.roles[0].name).change();

                $('#modalUpdate').modal('show');
            });

            // Update
            $('#formUpdate').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ Auth::user()->hasRole('superadmin') ? route('superadmin.user.update') : route('admin.user.update') }}",
                    type: "PUT", 
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Mohon Tunggu',
                            html: 'Sedang memproses data...',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        });
                    },
                    success: function(response) {
                        Swal.close();
                        $('#modalUpdate').modal('hide');
                        table.ajax.reload();
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    },
                    error: function(xhr) {
                        Swal.close();
                        let error = xhr.responseJSON;
                        Swal.fire({
                            title: 'Gagal!',
                            text: error.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });

            // Delete
            $('#table-user').on('click', 'button.btn-delete', function() {
                let data = $('#table-user').DataTable().row($(this).parents('tr')).data();

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Anda akan menghapus data user ' + data.name,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ Auth::user()->hasRole('superadmin') ? route('superadmin.user.delete') : route('admin.user.delete') }}",
                            type: "DELETE",
                            data: { id: data.id },
                            dataType: 'json',
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Mohon Tunggu',
                                    html: 'Sedang memproses data...',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading()
                                    }
                                });
                            },
                            success: function(response) {
                                Swal.close();
                                table.ajax.reload();
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                });
                            },
                            error: function(xhr) {
                                Swal.close();
                                let error = xhr.responseJSON;
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: error.message,
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
