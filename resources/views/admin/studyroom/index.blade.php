@extends('admin.layout')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Master Data - Kelas</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Kelas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>id</th>
                            <th>Nama Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>id</th>
                            <th>Nama Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($studyrooms as $studyroom)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $studyroom->id }}</td>
                                <td>{{ $studyroom->nama_kelas }}</td>
                                <td class="d-lg-flex gap-2 ">

                                    <button type="button" class="btn btn-sm btn-warning btn-edit"
                                        data-id="{{ $studyroom->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button data-id="{{ $studyroom->id }}" type="button" data-toggle="modal"
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('studyroom.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas">
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
                    <h5 class="modal-title" id="">Ubah Data Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="update">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control" id="nama_kelas"
                                placeholder="nama kelas">
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
            var url = "{{ route('studyroom.destroy', ':id') }}".replace(':id', id);
            $('#form-delete').attr('action', url);
        });
    </script>
    <script>
        $('.btn-edit').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = "{{ route('studyroom.edit', ':id') }}".replace(':id', id);
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('#modal-ubah').modal('show');
                    $('#modal-ubah').find('#id').val(data.id);
                    $('#modal-ubah').find('#nama_kelas').val(data.nama_kelas);
                }

            });

        });
    </script>
    <script>
        $('.btn-update').click(function(e) {
            e.preventDefault();

            let id = $('#id').val();
            let nama_kelas = $('#nama_kelas').val();
            let token = $("meta[name='csrf-token']").attr("content");
            var url = "{{ route('studyroom.update', ':id') }}".replace(':id', id);

            $.ajax({
                url: url,
                type: 'PUT',
                data: {
                    "id": id,
                    "nama_kelas": nama_kelas,
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
