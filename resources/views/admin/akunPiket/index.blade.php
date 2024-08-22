@extends('admin.layout')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Guru Piket</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
            <p>{{ session('success') }}</p>
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Gagal!</h5>
            <p>{{ session('error') }}</p>
        </div>
    @endif
    <div class="btn-group mb-2">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah-data">
            <i class="fas fa-plus"></i> <span>Tambah Data</span>
        </button>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Akun Piket</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Guru</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Guru</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td class="d-lg-flex gap-2 ">
                                    @if ($user->role != 'admin' && $user->role != 'kepsek')
                                        <button data-id="{{ $user->id }}" type="button" data-toggle="modal"
                                            data-target="#modal-default" class="btn btn-danger btn-sm btn-delete"><i
                                                class="fas fa-trash"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

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

<!-- Modal tambah data -->
<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="Nama">Nama Guru</label>
                        <select name="name" class="form-select" id="nama">
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->nama_guru }}">{{ $teacher->nama_guru }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="role">Role</label>
                        <select name="role" class="form-select" id="role">
                            <option value="guru_piket">Guru Piket</option>
                            <option value="admin">Admin</option>
                            <option value="kepsek">Kepala Sekolah</option>
                        </select>
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


@push('js')
    <script>
        $('.btn-delete').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = "{{ route('user.destroy', ':id') }}".replace(':id', id);
            $('#form-delete').attr('action', url);
        });
    </script>
@endpush
