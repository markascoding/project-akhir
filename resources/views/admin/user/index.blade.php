@extends('admin.layout')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Data User</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    <div class="btn-group mb-2">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-plus"></i> <span>Tambah Data</span>
        </button>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>id</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>id</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->password }}</td>
                                <td class="d-lg-flex gap-2 ">

                                    <button type="button" class="btn btn-sm btn-warning btn-edit"
                                        data-id="{{ $user->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button data-id="{{ $user->id }}" type="button" data-toggle="modal"
                                        data-target="#modal-default" class="btn btn-danger btn-sm btn-delete"><i
                                            class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal tambah data -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Nama User">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control"
                                placeholder="Email User">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="text" name="password" class="form-control"
                                placeholder="Password User">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal tambah data -->
<!-- Modal ubah data -->
<div class="modal fade" id="modal-ubah" tabindex="-1" aria-labelledby="modal-ubah" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Ubah Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="nama">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="email">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="password">
                    </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> --}}
                <button type="button" class="btn btn-primary btn-update">Ubah</button>
            </div>
            </form>

        </div>
    </div>
</div>
<!-- end modal ubah data -->

    <!-- modal hapus  -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-delete" action="" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus ?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <!-- end modal hapus  -->


@endsection
@push('js')
    <script>
        $('.btn-delete').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = "{{ route('user.destroy', ':id') }}".replace(':id', id);
            $('#form-delete').attr('action', url);
        });
    </script>
    <script>
        $('.btn-edit').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = "{{ route('user.edit', ':id') }}".replace(':id', id);
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('#modal-ubah').modal('show');
                    $('#modal-ubah').find('#id').val(data.id);
                    $('#modal-ubah').find('#name').val(data.name);
                    $('#modal-ubah').find('#email').val(data.email);
                    $('#modal-ubah').find('#password').val(data.password);
                }

            });

        });
    </script>
    <script>
        $('.btn-update').click(function(e) {
            e.preventDefault();

            let id = $('#id').val();
            let name = $('#name').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let token = $("meta[name='csrf-token']").attr("content");
            var url = "{{ route('user.update', ':id') }}".replace(':id', id);

            $.ajax({
                url: url,
                type: 'PUT',
                data: {
                    "id": id,
                    "name": name,
                    "email": email,
                    "password": password,
                    "_token": token
                },
                success: function(response) {
                    $('#modal-ubah').modal('hide');
                    location.reload(); // Refresh halaman untuk melihat perubahan
                },
                error: function(xhr) {
                    // Tampilkan pesan error jika diperlukan
                    console.log("error");
                }
            });
        });
    </script>
@endpush
